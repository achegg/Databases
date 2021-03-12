create table teacher(
login char(20) PRIMARY KEY,
pass char(20)
);
insert into teacher values ("teacher9000","teachpass");

create table exam(
eName char(20) PRIMARY KEY,
createdon datetime,
totalpoint int default 0
);

create table questions(
qnum int,
qtext char(50),
qpoints int,
correctans char(50),
eName char(20),
PRIMARY KEY(qnum, eName)
);

create table choice(
cid char(5),
qnum char(5),
eName char(20),
ctext char(50),
PRIMARY KEY(cid, qnum, eName)
);

create table student(
sID char(5) PRIMARY KEY,
sname char(15) not null,
major char(10),
password char(25) default "spass"
);

create table gradedexam(
sID char(5),
eName char(20),
qnum int,
s_answer char(50),
c_answer char(50),
points int default 0,
PRIMARY KEY(sID, eName, qnum)
);

delimiter //
create procedure addStudents(id char(5), name char(15), major char(10))
begin
insert into student values(
id, name, major, default
);
end//

create procedure addExam(name char(20), tpoints int)
begin
insert into exam values(
name, now(), tpoints
);
end//

create procedure addQuestion(qnum int, qtext char(50), qpoints int, 
correctans char(50), ename char(20)
)
begin
insert into questions values(
qnum, qtext, qpoints, correctans, ename
);
end//

create procedure addChoice(ch char(5), qnum int, ename char(20), text char(50))
begin
insert into choice values(
ch, qnum, ename, text
);
end//

create procedure setAns(answer char(50), num int, examname char(20))
begin
update questions set correctans = answer
where qnum = num and eName = examname;
end//

create procedure grade (id char(5), ex char(20), num int, sans char(5), cans char(5))
begin
IF(sans=cans) THEN
insert into gradedexam values (id, ex, num, sans, cans, (select qpoints from questions where qnum=num and eName=ex));
ELSE
insert into gradedexam values (id, ex, num, sans, cans, 0);
end if;
end//

create function checkgrade(id char(5), ex char(20))
returns int
begin
declare totalscore int;
select SUM(points) into totalscore from gradedexam where sID = id
and eName = ex
GROUP BY eName;
return totalscore;
end//


grant execute on function checkgrade to 'cs3425gr'@'%';
grant execute on procedure setAns to 'cs3425gr'@'%';
grant execute on procedure addChoice to 'cs3425gr'@'%';
grant execute on procedure addExam to 'cs3425gr'@'%';
grant execute on procedure addQuestion to 'cs3425gr'@'%';
grant execute on procedure addStudents to 'cs3425gr'@'%';
grant execute on procedure grade to 'cs3425gr'@'%';