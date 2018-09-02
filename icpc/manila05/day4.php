<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Day 4, Contest Proper (Oct 29, 2005) :: ACM ICPC Regional Manila</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/fh.jpg">
  <link rel="stylesheet" type="text/css" href="/styles.css">
  <script src="/script.js"></script>
</head>

<body>
<script>document.write(toolbar_template());</script>

<h1>Day 4, Contest Proper (Oct 29, 2005)</h1>

<p>Early morning at 8 AM, using Bus, we head to the Ateneo de Manila University but it seems to early. Since there was no schedule until 12 AM (the contest itself).</p>

<p align=center>
<img src="pre contest entrance.jpg">
<img src="pre contest canteen.jpg"><br>
We hanging around the entrance (left), and went to the canteen and stay there until 12 AM (right).<br>
</p>

<p align=center>
<img src="topi hitam topi putih.jpg"><br>
Kohar has a trick question before contest:<br>
There are 10 person lining up. Each of them are wore a hat with color either black or white (randomly assigned by someone).<br>
The person at the back of the line can see the person in front of him and the hat color they wear but not his own hat.<br>
An algojo came and start asking the each of the 10 person one by one starting from the back of the line: "What is the color of your hat?"<br>
Each person can only answer once: either "black" or "white". If the answer is correct the person can go free otherwise slaughtered to death.<br>
Can you come up with a strategy that can save the most number of person in the line?<br>
With your strategy, determine the maximum number of person that can go free, definitely.<br>
The answer is 9 people can survive. What is the strategy?
</p>

<br>
<h2>The Contest Begins</h2>

<p align=center>
<img src="contest smart and thinker bee.jpg"><br>
Smart Bee and Thinker Bee were adjacent, front and back.<br>
But Vinix was hidden at the back stage, no photos can reach that place
</p>

<p>The head of judge then start counting (like a child) from 10 to 1, then the contest begins. There are 8 <a href="http://acm.ateneo.edu/problems.html">problems</a> given:</p>

<table border=1 align=center cellpadding=3 width=800>
<tr>
	<th>Problem Name</th>
	<th>Problem Title</th>
	<th>Problem Category</th>
	<th>Difficulties</th>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/a.html">Problem A</a></td>
	<td>From Rational to Factorial</td>
	<td>Greedy</td>
	<td>Avoid Double data type! (only use double if you know how to handle precision error)</td>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/b.html">Problem B</a></td>
	<td>Right-Heavy Tree</td>
	<td>Graph Traversal</td>
	<td>The input is multiple input, but the sample input is not like that!</td>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/c.html">Problem C</a></td>
	<td>Portable Password Purse</td>
	<td>Ad Hoc</td>
	<td>Unclear problem statement, the protocol is not listed also the constraints of getting the domain name.</td>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/d.html">Problem D</a></td>
	<td>Any Relation?</td>
	<td>Set Operations</td>
	<td>Hard to parse input, thereafter is easy.</td>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/e.html">Problem E</a></td>
	<td>Mayday! Mayday!</td>
	<td>Recurrence</td>
	<td>Hard to read input: in Hexadesimal for the position, and unknown error, keep getting WA.</td>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/f.html">Problem F</a></td>
	<td>Check to Check</td>
	<td>Ad Hoc, Brute Force</td>
	<td>Relax, Andoko was there :D</td>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/g.html">Problem G</a></td>
	<td>Gotcha!</td>
	<td>Ad Hoc</td>
	<td>Relax, David was there :D</td>
</tr>
<tr>
	<td><a href="http://acm.ateneo.edu/problems/h.html">Problem H</a></td>
	<td>Counting Symbols</td>
	<td>Dynamic Programming</td>
	<td>Relax, David was there :D</td>
</tr>
</table>

<p>Below is the story of my team, Vinix. For the other teams, please give me some info so that I can include it here.</p>

<p>
During the contest, a lot of things happened but there nothing much I can remember. The first two hours went too quickly and I suddenly wanted to go to the restroom but I wasn't allowed, a committee told us to queue and jot down our team name. It take some time to get popped from the queue. Fortunately, I can hold on :D
</p>

<p>
We look around us, in front of us was University of Tokyo and at the back was Yonsei University - Arirang. They seemed to have a number of ballons and also Smart Bee and Thinker Bee got balloons too. When I looked at the standings projected on the big wall in the theatre, I saw that our team was ranked 23, the last rank before it became invisible from the top page. We haven't practically solved anything during the first 2 hours! I said to myself: "WOW, this is unbelievable, where should we put our face?"!
</p>

<p>
Actually, during the first 2 hours or so, we read and determine the easiest problems to solve first. Andoko was opted for Problem B - Right Heavy Tree. The problem is a straightforward graph traversal which like an everyday lunch for teaching-assistants like Andoko. But it turns out Wrong Answer! I then take over the hot seat and start coding for Problem C - Portable Password Purse. Because the problem description was so easy, I didn't even check the sample input and jump right to the coding. When I tested the code with the sample input, then I realize that this problem statement is very unclear! The "www" part is confusing, the "http://" is also doubtfull. The most confusing one is the TLD (top level domain). The problem statement just say ".edu, .com, .edu.ph, .com.sg, etc."  ETC??? what are the ETC? we can't solve the problem if we don't know the complete available TLD! Therefore this problem is unsolvable?!? For example, if you don't know that .com is a TLD, you would include .com as part of the domain, therefore you'll get WA! IMHO, why we didn't solve any problem during the first 2 hours is because of the invalid problem statement (Problem B - Right Heavy Tree) and because of the unclear problem statement (Problem C - Portable Password Purse)! 
</p>

<h2>Our first AC problem (Problem B - Right Heavy Tree)</h2>
<p>
After 2 hour has passed, there came a "point-light" (titik terang maksudnya). The Judges send clarification that it was a multiple input! Whatta? What a misleading problem statement! This wasting our precious time and unecessary penalty points! that was suck! We resubmit problem B and got AC, thanks to Andoko.
</p>

<h2>Our second AC problem (Problem F - Check to Check)</h2>
<p>
In the beginning, as a mathematician, Andoko tried to solve the problem using formula only. But after he realized that a path can be obscured by other piece, he had to do the loop either. He refined the code and got AC.
</p>

<h2>Our third AC problem (Problem H - Counting Symbols)</h2>
<p>
David was a Dynamic Programing expert, problem like this was trivial for him. Without much problem except little typo, he got AC.
</p>

<h2>Our fourth AC problem (Problem G - Gotcha)</h2>
<p>
This is an Ad Hoc problem and it's supposed to be my job but since I was a little occupied, David take over and got AC once again, thanks to David.
</p>

<p>
Wow, that was quick. Problem B, F, H, G just got AC rapidly. When I looked at the standing, I saw that our team, Vinix, were just 1 position below Smart Bee with the same number of solved problems. Then I observe the standings for the clue of which problem that has the most number of AC. It turns out that almost none submit Problem C! So, in our mind, that Problem is still very unclear to most of the team and I decided not to continue that problem either. We seek for Problem E - Mayday! Mayday.
</p>

<p>
Spoiler: after contest, I found out that the problem name that was shown in the standing was not correct! The problem name was out of order! Problem D was shown as Problem C in the standings! That was MIS-LEADING. I got very angry knowing this fact. I could've continue solving problem C and maybe got AC out of it.
</p>

<br>
<p>
Actually, in between the 4 AC problems there were numerous WA for Problem A, submitted by me :D. I immediately became interested in this problem since I saw it from the first time. In my mind, Greedy is sufficient. I started the coding and submit it to the Judges... Jebret... Compile Error? What the... It's Impossible! I rechecked my code, but there was no sign of compile error on my local machine! Why did the judge said "Compile Error?". I did execute the test button on the PC2 and it was a success, and resubmit to the Judge. But again, the reply was still Compile error!?! I resubmit again and got Runtime Error!?! I got depressed. My team mates suggest me to rewrite my Java code to C++ code. I then instruct the fastest typist in my team, Andoko, to do the job. Then resubmit... Runtime Error... This time I really believed that my code had some flaws, I printed it out.
</p>

<p>
During the last 1 hour, I was still struggling with Problem A, while Andoko and David were struggling with Problem E - Mayday! Mayday! (the problem name matches our situation!). I was quite depressed with Problem A and wanted to change to Problem D but Andoko said that the time would not be sufficient. I think what he said was quite true, so I make up my mind and go to the restroom, preparing myself to re-code the Problem A from scratch! This time with refactoring the double precision functions!
</p>

<h2>Our fifth AC problem (Problem A - From Rational to Factorial)</h2>
<p>
At last! Problem A, after delving through many Compile Errors in Java, rewritten into C++, many Runtime Errors in C++, rewritten again from scratch in C++ and refactored some of the code, it got AC! The algorithm was still the same, but this time, the code is a lot more careful on the precision error which caused and endless loop and exceeding the array boundary which triggered the Runtime Error. Huff, fortunately I have some experience on precision error from last year: always add an EPSILON before doing things such as comparision, fmod, etc.. Spoiler: Later on I found out that using only integers is sufficient and it doesn't need to deal with precision error! hix2.. why don't I realize this sooner!
</p>

<p>
Till the end of the contest time, Problem B was still stucked. We were off with 5 solved problems, 4 balloons (the last was not given).
</p>

<p align=center>
<img src="post contest vinix.jpg"><br>
We managed to solve 5 problems.<br>
</p>

<p align=center>
<img src="post contest closing.jpg"><br>
We assembled in the basket ball court for closing ceremony.<br>
</p>

<p align=center>
<img src="post contest ui unpar.jpg"><br>
Universitas Indonesia and Parahyangan University.<br>
</p>

<br>
<h2>The Winners</h2>
<p align=center>
<img src="foreign 1.jpg"><br>
The first overal winner is team Fate, from University of Hong Kong.<br>
</p>

<p align=center>
<img src="foreign 2.jpg"><br>
The second overal winner is team Extreme, from University of Tokyo<br>
Actually they sat in front of us during the contest, we should've give them "the bread" :D
</p>

<p align=center>
<img src="local 1.jpg">
<img src="local 2.jpg">
<img src="local 3.jpg"><br>
These are the best 3 local teams. I don't know which one is what team.<br>
The third best local team was ranked 25 with team name Persistence from Ateneo de Manila University.<br>
I somehow got dissapointed because the head of Judge didn't even mention the Top 10 teams.
</p>

<p>While we're waiting for the bus to pick us up, we wandered around the campus and eventually got back to the contest site (the theathre) to get the Certificates.</p>

<p align=center>
<img src="contest ruangan.jpg">
<img src="post contest ruangan.jpg"><br>
We were back to the theatre where the contest was held. Susu was shocked... Where were all the computers and chairs?<br>
The left pic is the theatre situation when the contest was going on. The right pic is just 2 hours after the contest has ended!?!?<br>
The theatre got cleaned in 2 hours, that's incredible!
</p>

<p>
IMHO, they were forcing themself too hard on making the theatre as the contest site! If you look at the left picture, there were 3 teams positioned on the stage! This clearly shows that the theatre was too small to fit 98 teams! During the contest, I have to put my papers on the floor because of no place left on the table (in the left picture, you can see that some other teams do the same thing). Also when I swapped seat with my team mates, sometimes I incidentally hit the monitor behind us! Also, I think some network problems for printing for some teams occurred due to their lack of preparation. During the practice session, the printing feature was not implemented! They set up the printer just before the contest! No wonder some teams got printer problems.
</p>

<p align=center>
<img src="post contest all.jpg"><br>
All Indonesian team in the theatre room.
</p>

<p align=center>
<img src="post contest coaches.jpg"><br>
The coaches: Win Ce Bong (Binus), Rosa de Lima (Unpar), Yen Lina (Binus), Suryana Setiawan (UI), Sani Mohamad Isa (Untar)
</p>

<p align=center>
<img src="waiting for the bus.jpg"> 
<img src="into the bus.jpg"><br>
After getting the Certificates and all the team ranklist, we went to the campus entrance waiting for the bus.<br>
Some of us were dropped at Richmonde Hotel, the rest at the Linden Suites.
</p>

<p align=center>
<img src="hannah in bus.jpg"> 
<img src="inside bus.jpg"><br>
As we can see, on the left pic, David intentionaly blocked Hannah from going out of the bus for some reason :D<br>
</p>

<p align=center>
<img src="jollibee.jpg"><br>
At night we barely found open restaurants! We traveled a long way down the road seeking for food.<br>
Somehow in the street, we found the Fate team. It seemed that they were also seeking for food.<br>
At the end of our starvation, here comes our saviour, Jollibee! We ate as much as our budget.<br>
And came up with the idea of a robber with recipes... ahahhaha!<br>
</p>


<p align=right>Next : <a href=day56.php>Day 5, Stay in Richmonde (30 Oct 2005)</a></p>
<p align=right>Back to : <a href=index.php>Index</a></p>
<br><br>

Quick Jump:
<ol>
<li><a href="day12.php">Day 1, Take off to Kuala Lumpur (26 Oct 2005)</a>
<li><a href="day12.php#day2">Day 2, Take off to Manila (27 Oct 2005)</a>
<li><a href="day3.php">Day 3, Registration & Practice Session (28 Oct 2005)</a>
<li><a href="day4.php">Day 4, Contest Proper (29 Oct 2005)</a>
<li><a href="day56.php">Day 5, Stay in Richmonde (30 Oct 2005)</a>
<li><a href="day56.php#day6">Day 6, Take off to Kuala Lumpur (31 Oct 2005)</a>
<li><a href="day78.php">Day 7, Wandering Kuala Lumpur (1 Nov 2005)</a>
<li><a href="day78.php#day8">Day 8, Fly back to Jakarta (2 Nov 2005)</a>
</ol>
