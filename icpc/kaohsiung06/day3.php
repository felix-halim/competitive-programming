<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Day 3, Contest Proper (Nov 18, 2006) :: ACM ICPC Regional Kaohsiung (Taiwan)</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/fh.jpg">
  <link rel="stylesheet" type="text/css" href="/styles.css">
  <script src="/script.js"></script>
</head>

<body>
<script>document.write(toolbar_template());</script>

<h1>Day 3, Contest Proper (Nov 18, 2006)</h1>

<p>Today is the competition day. I didn't feel nervous at all, maybe it's because I've been in too many contest or maybe it's because my team members are all cheerful and always make jokes :P</p>

<p align=center>
<img src="DSC_2600.JPG"><br>
Here is Westlife :P, you all look so cool today guys!<br>
I don't have a coat to wear, but I wear my magical-powered-long-sleeve shirt :D<br>
This gives me Intelligence++, Accuracy++, Awareness++ :P
</p>

<p align=center>
<img src="DSC_2596.JPG">
<img src="DSC_2599.JPG"><br>
There seemed to be a mistake in the schedule, we now doing nothing for almost 30 minutes!<br>
Actually the breakfast was too short, I only had the opportuinty to eat cakwe and drink milk (energy booster).<br>
They should give more time to the breakfast time, and lessen the preparation (doing nothing) time :(
</p>

<p align=center>
<img src="DSC_2602.JPG">
<img src="DSC_2605.JPG"><br>
The left side is the energy booster for Andrian Kurniady, he will perform well after eating those chocolates!<br>
Then it is the time for the contest proper, we all assembled in the competition room.
</p>

<h3>Contest Proper</h3>

<p>Here it comes, the competition has begun. Kurniady did some settings to the compiler for automating the compilation and run while 
Andoko and I were searching for the easiest problems. I've to say that this competition went really tight. Let see how we got accepted for the problems and a little description about the problem and how we solved it. The problem statements can be downloaded <a href="http://guan.cse.nsysu.edu.tw/acm06/problems.pdf">here</a>. We managed to print out our Accepted source codes and type it again at home, you can download it <a href="source.zip">here</a>. Please keep in mind that the source codes possibly have some mistypes, however it compiles.</p>

<h3>The first (Yoi)AC - Problem A - Print Words in Lines - (Minute: 19)</h3>

<p>When Kurniady finished the setup, he read problem A, code it immediately, and got it Accepted! I couldn't belive it... That was fast! When we looked at the standings, we were rank 7. It seemed that 6 other teams got the problem Accepted faster than us.</p>

<p>The problem is about how to split the text of N words into multiple lines of maximum M characters. The penalty for each line is the square of the difference between M and the number of characters printed on that line. You've to find the minimum total penalty.</p>

<p>Kurniady solved it using Dynamic Programming (you guessed it! using his special dpmat variable). The DP is similar to LIS but only goes back until up to certain number of words not exceeding M.</p>

<p>Our team morale goes up!</p>

<h3>The second (Yoi)AC - Problem E - Route Planning - (Minute: 71)</h3>

<p>Let me simplify the problem without making it easier. This problem gives you N(&lt;= 100) cities, its distance among each other as a matrix N x N and M(&lt;= N) selected cities. You have to plan a shortest-distance route that visits all of the M selected cities, print the shortest distance.</p>

<p>When Kurniady was coding problem A, I read problem E and decided to attack this problem using A*. My instinct about top-down Dynamic Programming failed (I cannot come out with a good DP parameters, the DP parameters are so huge!), so I tried using A* and hopes the judges input was not very critical. FYI, A* will either timeout or memory limit exceeded when all of the city distances are <b>equal</b> but will run quite fast when the city distances are <b>randomized</b>! I was gambling then. When I submit it, it got Accepted! What a Luck!</p>

<p>When we look at the standings again, we are rank 3, Yoii... Two teams number 47 and 50 were above us.</p>

<h3>The third (Yoi)AC - Problem I - Perfect Service - (Minute: 97, +20 penalty)</h3>

<p>Kurniady take over the hot seat, and code this problem. Actually he wasn't supposed to do the coding but it's better than leaving the hot seat empty :P. I then hunting for another easy problem while Andoko assist Kurniady to spot any coding errors Kurniady may type, just like Extreme Programming eh?</p>

<p>This problem gives you a connected graph of N nodes with N-1 vertices (a spanning tree). You have to decide/select K number of nodes as the servers so that any nodes that are not selected is connected directly to one server. Print the minimum possible K.</p>

<p>Kurniady strikes back. He got it Accepted with DP combined with recursion. Here is his explanation for the solution:</p>

<p>The problem I represent a unique class of DP problems, which is about similar to the Rivers task of IOI 2005 (but this one is simpler, of course). The basic characteristic of this problem is that the graph made a tree. We need to traverse the tree deeply while systematically trying every possible combination with a DP approach. Imagining this problem in a linear form will help a lot in finding the DP states and formula. The linear form can be then paired into recursion to achieve a tree-traversing form, which is the solution for this problem. In linear form, imagine each node can have three possible states : it is a server, it is already served by a nearby server, and it is still needing a server. The linear form require a one-way iteration, thus, the tree version require a postorder traversal. Combining the postorder traversal with the DP formula creates an elegant solution to this problem.</p>

<h3>The fourth (Yoi)AC - Problem F - Shift Cipher - (Minute: 135)</h3>

<p>When Kurniady struggling for Problem I, I found this problem easy. The only concern is the memory, and speed. But that didn't concern me too much, just "hajar bleh" using hash_map :P then look for the outcome :P (actually I did the "WA gak bayar" too early :P, even for Problem E above).</p>

<p>This problem instruct you to read a dictionary (a file located in /usr/share/dict/american-english), and gives you a cipher text. The method of encryption is similar to <a href="http://en.wikipedia.org/wiki/ROT13">Rot 13</a> encryption scheme only that in this problem the rotation can be any number K (&lt; 26). We have to decrypt the cipher text by finding the K. Print the K, and the plain text. The cipher text is said to be decrypted if all resulting text are all in the dictionary. The catch is that if more than one plain text found, we have to choose those having the minimum number of words in the plain text, and if there is a word of length 1 then the next word cannot be of length 1.</p>

<p>I solved it using bruteforce + recursion. I did a bruteforce for all possible K (0 to 25) and for each K, I did a recursion to decipher the cipher text with each characters rotated K times. Each step of the recursion will find a word in the dictionary and checking the length of the previous word. If it found a solution, it will compare the minimum number of words and select the smallest. This kind of recursion will take a long time to implement if I don't know about STL string and STL pair! Thanks to TopCoder community, I learned a lot about STL from each SRM :)  You'll never know when your knowledge will come in handy!</p>

<p>We looked at the standings again, and we are rank 1!! This is the first time I see my team name reached rank 1.</p>

<h3>The fifth (Yoi)AC - Problem B - The Bug Sensor Problem - (Minute: 162)</h3>

<p>This is the only problem that was solved by Team work: Andoko read the problem statement, simplify it to Kurniady. Kurniady "licikin" and decided that it's just a regular MST Kruskal problem. Andoko then told only the necessary thing to me, I then coded it and got it Accepted! I actually didn't have a slightest idea about what is the actual problem about :P. I just code a regular MST Kruskal, it was really easy for me.</p>

<p>If you read the problem again (download the PDF <a href="http://guan.cse.nsysu.edu.tw/acm06/problems.pdf">here</a> if you haven't download it above), actually the wording is quite hard. Thanks to Andoko ability to understand hard problem description and simplify it. Basically you are given a set of N points, so it is a graph of N connected components. You have to connect the points until you have M connected components. Print the minimum distance of the last two points you connected.</p>

<p>It can be solved greedyly using MST Kruskal, and keep track of the number of connected components as you merge. You can see the source code, it's really concise and clear.</p>

<p>Before we submit this problem, our team drop to rank 2. The first rank is team number 29 with 5 AC problems. After got this problem Accepted, we regain our position to rank 1. Soon after this many teams also solved 5 problems, however our team has the lowest time and penalty so our rank stand still.</p>

<h3>The sixth (Yoi)AC - Problem G - A Scheduling Problem - (Minute: 283)</h3>

<p>Wow, look at the minute. It's been idle for 121 minutes before we got this problem Accepted. The audience must be bored to see idle standings for 2 hours :P. In the middle, Lacotix took the first place for solving 6 problems. We know that we need to solve 2 more problems to be rank 1 again. But I were not too stressed because I believe that we can get Problem D accepted since this problems was solved by many teams. Andoko and Kurniady were discussing Problem D while I code for this Problem G.</p>

<p>This problem is a scheduling problem, but was made a lot easier because there is no <b>circular</b> task. In other word, the dependency is a tree-like structure. There are 2 constraints: Conflict Constraint (A task cannot be executed at the same time with a certain task) and Precedence constraint (A task cannot be executed before all its predecesor are executed). The constraints are modelled as (possibly disconnected) a graph with no cycle.</p>

<p>I did a speculation again for this problem. At first, I thought this problem is an A* problem (again, too much coding A* lately). When I jump into coding, I realized that one node can only generate 1 other node, so my A* degenerates become a greedy simulation. It's funny, please look at the source code, the priority_queue is useless :P.</p>

<p>The greedy simulation goes like this: Store all of the tasks that has not been executed and satisfy all precedence constraint in an array. Sort the array based on the "weight" of the task. The weight of a task is the number tasks in the subtree of that task (consider only the directed edges (the precedence constraint) when counting the subtree). Now try to execute one by one the task in the sorted array from the task that has the most weight to the lowest. If the task conflict with the previously executed task, then don't execute the task.</p>

<p>Do the greedy simulation until all task has been executed, and print the number of days needed to execute all tasks.</p>

<p>When we looked at the standings, it wasn't available.</p>

<h3>The seventh (Yoi)AC - Problem D - Lucky and Good Months by Gregorian Calendar - (Minute: 284)</h3>

<p>When I code problem G above, I was really need to go to the rest room! I was really hungry and thirsty. I held my desire to the restroom until I submit problem G. After I submit problem G, I hurriedly went to the restroom. It is really convenience to go to the toilet, eat anywhere, just like our own home. I love this ACM ICPC contest!</p>

<p>At the toilet, I keep praying that when I get back, I'll heard a good news. Just when I get back to the competition room I can see it from far that Kurniady's and Andoko's were smiling. I was really happy then. Then I hurriedly trashed the problem statements paper that already solved and hurriedly think how to attack problem C. It's just 13 minutes left.</p>

<p>It's only about 1 minute when I got back from the restroom, Problem D got Accepted! Ahhh, I feel really excited! Instead of continuing on problem C, I switched to praying so that Lacotix team doesn't solve another problem :P. Actually I intend to code problem C using super big DP states and see if the Judge's memory is really that big :P</p>

<p>This problem D was coded by Andoko Chandra helped by Andrian Kurniady. This problem already got WA 2 times before it got AC. We intend to do a many "WA gak bayar" to submit every possible combinations of solutions. Try look at the problem description, it's like a novel :(. The first time I see this calendar problem, my morale drops and immediately switch to another problem. Thanks to Andoko, motivated by Ryan Lionel which can calculate the days in his brain, he managed to get it Accepted!</p>


<p align=center>
<img src="103.jpg"><br>
Here is Andoko Chandra coding Problem D - Lucky and Good Months by Gregorian Calendar.<br>
</p>

<p>Problem D is an easy-but-long problem description. The problem only asked about how many lucky and good days are there in the specified range of two dates. We have to deal with many nasty rules in Gregorian Calendars :(. Let's end this story before you got bored :P</p>

<p>That's it how we solved 7 of the total 9 available problems.</p>

<br><br>

<p align=center>
<img src="DSC_2607.JPG"><br>
The contest has ended, the water was drained, the burgers were eaten :P<br>
</p>

<p align=center>
<img src="DSC_2610.JPG"><br>
We got 5 balloons before the standings was freezed.
</p>

<p align=center>
<img src="DSC_2619.JPG">
<img src="DSC_2620.JPG"><br>
We go to the rendezvous point again, the meeting hall.<br>
This is when the ACM ICPC Asia Regional Director, Dr. C. J. Hwang approaches our coach, Mr. Raymond Kosala.
</p>

<p>Dr. C.J. Hwang talks about his interest in hosting an ACM ICPC Regional in Indonesia! He really liked Bina Nusantara to start preparing the environment to matches the ACM ICPC kind of contest, the PC2, the scoring system, the problem sets, etc... And he believes that many contestants will be willing to travel to Indonesia to compete, the only concern is safety. It's amazing that Dr. C.J. Hwang still remember Mr. Thompson Susabda Ngoen (Bina Nusantara coach in 1997).</p>

<p align=center>
<img src="DSC_2616.JPG"><br>
Our coach told us about what Dr. C.J. Hwang said earlier.
</p>

<p>
Now the announcements for the winners begins. Since the number of solve problems differs greatly and there's a large gap for certain rank, the award is slightly changed. Those teams who solved 2..3 problems get Bronze, those who solve 4..6 get Silver, and those who solve 7 problems get Gold Award. It was shocking that 5 teams managed to solve 7 problems! This really is a tight competition, luck factor really plays an important role in such situations :D
</p>

<p align=center>
<img src="DSC_2632.JPG">
<img src="DSC_2634.JPG"><br>
The Bronze and Silver awards were given.<br>
There's slight confusion in giving the awards, there's so many teams and<br>
the awarder don't have any idea which certificate goes to which team :P
</p>

<p align=center>
<img src="DSC_2637.JPG">
<img src="DSC_2638.JPG"><br>
These are the 5 teams that solved 7 problems: YoiAC, Lacotix, puyo, The Sleeping Beauty, H-E-A-T.
</p>

<p align=center>
<img src="DSC_2650.JPG"><br>
Rank 3 to 5 were mentioned and asked to leave the podium. There's only two teams left:<br>
<b>Lacotix</b> (Shanghai Jiaotong University) and <b>YoiAC</b> (Bina Nusantara University).<br>
And The team who advanced to the ACM ICPC World Finals in Tokyo is...<br>
</p>

<p align=center>
<img src="DSC_2651.JPG"><br>
<b>YoiAC</b> from Bina Nusantara University, Indonesia!!<br>
Going to the ACM ICPC World Finals is one of my dreams.<br>
This is one of the greatest event in my life, I feel really proud :)<br>
</p>

<p align=center>
<img src="DSC_2658.JPG"><br>
Cheers once again guys! The official standings can be found <a href="http://icpc.baylor.edu/icpc/regionals/ViewRegionalStandings.asp?ContestID=769">here</a>.<br>
The first place team got these gifts: Mouse Acer (the mouse can shine in different colors, nice!),<br>
DVD -R (25pcs, to burn many movies & pictures), DVD bag (24 slots) and of course..<br>
<b>A ticket to the ACM ICPC World Finals 2007 in Tokyo - Japan</b>.<br>

<p align=center>
<img src="DSC_2660.JPG">
<img src="DSC_2663.JPG"><br>
After the award session, we went to one of the best "seafood" restaurant for dinner.<br>
We need to wait for another bus, and lots of jokes spelled again :)<br>
Any university will look spooky at night (see the right pic).
</p>

<p align=center>
<img src="DSC_2665.JPG"><br>
Itadakimasu...<br>
I don't really like seafoods, but hajar bleh anyway :P
</p>

<p align=center>
<img src="DSC_2666.JPG">
<img src="DSC_2667.JPG">
<img src="DSC_2668.JPG"><br>
We really enjoyed the dinner.
</p>

<p align=center>
<img src="PICT0465.JPG"><br>
Who is the girl behind me? So cute, and whose camera shoot this photo? Thanks! :P<br>
I think she is from Shanghai Jiaotong University... :)<br>
Ndok, rugi luh gak kenalan :P, basa basi donk minta minum hahah :P<br>
Soalnya cuma elu yang punya "special ability" untuk ngomong ama dia, trus bawa pulang ke indo (ganas mon) :P<br>
Note: special ability maksudnya bisa ngomong chinese :P
</p>

<p align=center>
<img src="PICT0466.JPG"><br>
Eventhough I only ate about 40% of the total, <br>
I really appreciate ACM ICPC committee who made this dinner event! :)
</p>

<p align=center>
<img src="DSC_2678.JPG"><br>
Just outside the restaurant there is the <b>Love River</b>.<br>
(This photo was taken by our stylish photographer, see below)
</p>

<p align=center>
<img src="IMG_0457.JPG">
<img src="PICT0495.JPG">
<img src="DSC_2685.JPG"><br>
There's so many artists along the street near the Love River.
</p>

<p align=center>
<img src="PICT0478.JPG">
<img src="DSC_2692.JPG"><br>
This is how our stylish photographer, Andrian Kurniady, shoot the picture :P (cool! boleh2!)<br>
The right picture is a statue of a Dragon with fish tail at the back. It is known that after rotating 360 degree,<br>
the dragon will become alive and flying around the sky, sprout fire from its mouth and dive into the water and swim,<br>
then go back to the statue. However that's only in Mr Lim's mind :D
</p>

<p>Just before going into the bus to the King Ship hotel, Master Ndok realized that he has lost his passport some where
along the Love River. He and I did backtrack to search for the missing passport. After doing DFS several times: check
the street, check the policeman at the bridge, check the street again, the passport still couldn't be found. 
Fortunately, Master Ndok still have a little bit of luck left. William Artan, our savior, talked to the policeman along 
the street and "pok" the passport is there. Thanks to William Artan!</p>

<p>That's it, now I have to practice again for the World Final.</p>

<p align=right>Next : <a href="prep.php">Preparation we did for this year ACM ICPC</a></p>
<p align=right>Back to : <a href="day2.php">Day 2, Registration & Practice Session (17 Nov 2006)</a></p>
<br><br>

<div include-html='footer.php'></div>
<script>include_htmls();</script>
