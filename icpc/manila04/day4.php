<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Day 4, Contest Proper (Nov 12, 2004) :: ACM ICPC Regional Manila 2004</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/fh.jpg">
  <link rel="stylesheet" type="text/css" href="/styles.css">
  <script src="/script.js"></script>
</head>

<body>
<script>document.write(toolbar_template());</script>

<h1>Day 4, Contest Proper (Nov 12, 2004)</h1>
<p>Today is the contest day! After warming up with problems from Aizu and India which is very hard, we went straight to the UA&P for registration and head to the Lab for contest.
<p>When the contest starts, we immediately search for the easiest problem :)

<h2>Our first solved problem</h2>
<p>It is decided that problem A is the most easiest one. But we had 4 wrong answer before got it Accepted! It's all because of floating point error! Here is the problem: sometimes the result of division is not exactly a whole number, but really close to the whole number. And because the expected result is the truncated result of the division, we always have wrong integer as the output (always less 1 than the expected output).
<p>Example: the result of the division is 5.999999999999999999999
<p>The correct answer is 6. But if you truncate the result it would result 5!!!!
<p>The solution is to add EPSILON 0.000000001 to the result: 5.99999999999999 + 0.0000000000001 = 6.0000000000001 and then the result is truncated become 6 which is correct... Piyuh!!!

<h2>Our second solved problem</h2>
<p>The second easiest problem after problem A is problem C. It is easy but take some time to code!
<p>The problem is to search a word in 3 dimensional matrix and find the previous or the next word after the searched word. It has 26 directions!

<p>At first, I solve this using 1 function for 1 direction. After I realize that there are 26 directions, I give up and rewrite all the code from scratch. I changed it to recursion with 26 branches. But I forgot to add some directions until Nicholas and Christian spoke about direction that going up :)
<p>We submit this problem 3 times to get it Accepted!

<h2>Our third solved problem</h2>
<p>Contest nearly over, we spent too much time on problem A and C. Near the end of the contest, we submit 2 problems: H and B. Christian and Nicholas solve problem H, and I solve problem B.
<p>Problem B is also a recursion problem! The problem is: given the interconnection of the atoms in two hydrocarbon molecules. Determine if the two hydrocarbon molecule are identical or not.
<p>Our solution was: determine the root for the first molecule (molecule can be represented by tree data structure), then brute force for the root for the second molecule and each root for the second molecule, we compare it with the first molecule. If all the interconnection from the root to the leaf is exactly the same, then the molecules are identical, and the algorithm stops here. 
<p>This problem is the critical problem! If only we didn't solve this problem, BiNus wouldn't have reached 9'th position. Maybe we'll be dropped from the Top 10.
<p>Recursion problem is really hard to debug, we encounter problems during debugging this problem. Fortunately, in the last minutes, our program gave the correct answer for the sample input (ONLY). The contest will be over in 1 minute! I don't have time to test the program for another testcase! Hurriedly, I submit the code to the judge (two times using different compilers, Turbo C++ and GNU C++). We didn't know the judge reply because the contest is over and the PC^2 is not functioning anymore.
<p>Before I submit problem B, Christian & Nicholas submit problem H. So, in the last minutes, there are 2 problems that were submitted: B dan H. We are all very curious about the result! 
<p>The ranklist was beeing freeze so we can't see the standings. Our team was at 8'th position and we are sure if the last 2 problems we submit are all wrong, then we will be dropped from the Top 10!
<p>Sayine & Glyza congratulate us after the contest was over, that relaxed us a bit.
<p>Then the Coaches assembled in Coach Briefing, to introduce the Judges. We then took our "Almamater" jacket at Richmonde Hotel (who knows that we'll be in Top 10). Then head back to UA&P for the AWARDS NIGHT.
<p align=center><img src="awards01.jpg"><br>We are in awards night now<br>We are sitting at the VIP seats :) 
<p>The universities are called from the bottom to the first. We are hoping that our team is not called before Top 10. And YESS, our team is not called!
<p>The Top 10 teams are asked to go to the podium to receive Certificate and gift from IBM (we got ballpoint and pencil).
<p align=center><img src="awards02.jpg"><br>Our team go up to the podium : (Mr. Thompson, Christian, Felix Halim, and Nicholas)<br>Certificates and IBM gift (ballpoint and pencil) are hold by Mr. Thompson
<p>After Awards Night, we took a rest. But, we are really curious about the last 2 problems submitted! We are not sure which problem (B or H) is accepted! But we know one of them is accepted since the announcement said that BiNus solved 3 problems.
<p>This night Sayine wanted to go home, this is our last picture with Sayine.
<p align=center><img src="sayine.jpg"><br>Our last meeting with Sayine, our nice guide.
<p align=center><img src="unpar.jpg"><br>Take photos with Parahyangan University, we all happy<br>This picture take place in Richmonde Hotel
<p align=center><img src="glyza.jpg"><br>These photos is taken after contest (look at the balloons!)<br>Take last picture with Glyza, our nice guide.

<br><br><br><br>
<p align=right>Next : <a href=day5.php>Day 5, Fly back to Jakarta (8 Nov 2003)</a>
<p align=right>Back to : <a href=index.php>Index</a>
<br><br>
