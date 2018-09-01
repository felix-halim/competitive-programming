<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Day 4, ACM-ICPC World Final Contest, Awards ceremony, and Surprise event (March 15, 2007) :: ACM ICPC World Final Tokyo, Japan</title>
  <meta name="author" content="Felix Halim">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/fh.jpg">
  <link rel="stylesheet" type="text/css" href="/styles.css">
  <script src="/script.js"></script>
</head>

<body>
<script>document.write(toolbar_template());</script>

<h1>Day 4, <b>ACM-ICPC World Final Contest</b>, Awards ceremony, and Surprise event (March 15, 2007)</h1>

<p>Today is the contest day. After the breakfast, Bill Poucher wandered around talking with the teams bringing the ACM ICPC Trophy with him. Many teams got chance to take picture with him and the Trophy as a "fake" champion. The spectators were invited to enter to the contest room at the back stage and then Bill Poucher invited all the team to enter the contest room with him. The background music that surrounds the contest room was very good (I don't know the title of the music, can anyone tell me?)</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044598572505047378"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIDrJybIVI/AAAAAAAAAZY/T10_NfwpqBo/s288/IMG_0424.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044598877447725410"><img border="0" src="http://lh5.google.com/image/felix.halim/RgID85ybIWI/AAAAAAAAAZg/4fSMO4pCdKo/s288/IMG_0425.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044598971937005938"><img border="0" src="http://lh3.google.com/image/felix.halim/RgIECZybIXI/AAAAAAAAAZo/q6h7xgUeSYI/s288/IMG_0423.JPG" /></a><br>
These pics were taken by our coach (which categorized as spectators)<br>
There were a good music played in the background
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044599117965894018"><img border="0" src="http://lh5.google.com/image/felix.halim/RgIEK5ybIYI/AAAAAAAAAZw/tX3i5xd3tjw/s400/IMG_0433.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044599182390403474"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIEOpybIZI/AAAAAAAAAZ4/cxEhCb4llhg/s400/IMG_0435.JPG" /></a><br>
Bill Poucher and Shingo Takada then officially start the ACM ICPC World Final 2007<br>
</p>

<p>As usual, Kurniady starts by preparing the computers with "batch" files to automate the compiling and testing because he is who understand the linux environment the most. The settings were more or less the same with one in Taiwan, very convenient. Andoko and I start reading the problem statements. There are 10 (A to J) problems presented in this World Final. The complete problem set can be downloaded <a href="http://icpc.baylor.edu/icpc/Finals/2007WorldFinalProblemSet.pdf">here</a>.</p>

<h2>First accepted Problem B - Containers (24 Minutes)</h2>

<p>I don't know why, when I first read this problem I didn't quite get the problem statement meaning. I asked Andoko to explain the problem statement to me according to his understanding. Don't know why, every time he finished his explanation (and I asked some cases to verify my understanding) I almost always want to code it right away.</p>

<p>This is the simplified problem statement: Given a word on a line consist of N (0 < N < 1001) letters (A..Z). One by one, we have to put these letters into M stacks with a constraint: if the stack is not empty, the letter inserted into that stack can only be smaller than or equal to the top of that stack. The question is: What is the minimum value of M?

<p>I came up with a greedy + binary search algorithm for this problem: Binary search the M, and greedily test the solution. The greedy test is like this: if you have M stacks and you have to put a letter into one of these M stacks, choose the stack which its top has the closest value with the letter otherwise you will lose something.</p>

<p>Andoko doubt that this method will work, but I coded and submitted it anyway and got it Accepted, Yayy! I looked at the standings, we got 4th rank! Hmm.. a good start!</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044599332714258850"><img border="0" src="http://lh3.google.com/image/felix.halim/RgIEXZybIaI/AAAAAAAAAaA/YVvA3tXDA28/s400/IMG_0437.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044599384253866418"><img border="0" src="http://lh3.google.com/image/felix.halim/RgIEaZybIbI/AAAAAAAAAaI/RJW0JelLgeM/s400/IMG_0438.JPG" /></a><br>
The ranklist showed that we were ranked 6. There must be 2 teams got two accepted problem this time, what a fast competition<br>
Our yesterday's picture at the practice session showed up whenever we solved a problem (the same with other teams)
</p>

<h2>Second accepted Problem G - Network (209 Minutes)</h2>

<p>Wow.. 185 Minutes idle?!? (its 185 minutes elapsed since problem B got accepted).</p>

<p>I really was having a bad day here! The problem was tricky because there is a word in a problem statement that easy to miss. The word is "consecutive". This generates a lot of discussion between Kurniady and Andoko.</p>

<p>The problem statement is this: There are N (1&lt;=N&lt;=5) messages numbered 1 to N to be sent over network. The N messages were split into M packets. Each packet is labeled with packet ID (which is the message number itself), the starting byte and the ending byte position for the packet. You are given the total size of each of the N messages, and the arrival order of the M packets. You have to determine the minimum size of the buffer needed in order to reconstruct the message. Any packet can go into the buffer and leave in any order.</p>

<p>Somewhere in the problem statement, there is a tiny word "consecutive" which means if you are currently constructing message number 3, you cannot in the same time constructing other messages! The other messages must go into the buffer. If only the word "consecutive" doesn't exist, it would make the problem much simpler (and we doubt that World Finals problem should be that easy): it become a simulation problem.</p>

<p>Because of the "consecutive" constraint, we need to permutate the order of the messages get constructed (5! possible permutation). Still, the problem was very easy (just brute-force). But since I was having a bad day, I got Runtime Error for the first submission (it was because of totally logic error and therefore wrong code). The second submission on this problem, I got Wrong Answer because of the logic error again (my algorithm didn't follow the "consecutive" constraint). At last, the third time after Andoko made several test cases and verified the answer, it got Accepted.</p>

<p>That's why it take 185 minutes! It appeared not only our team having this kind of problem, many teams didn't see the "consecutive" word (by the time they realize it, they need to re-code everything). See this <a href="http://forums.topcoder.com/?module=Message&messageID=774019">TopCoder Thread</a> for that discussion.</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044609919808643554"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIN_pybIeI/AAAAAAAAAag/XtTGl9GSpwg/s288/IMG_0440.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044609988528120306"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIODpybIfI/AAAAAAAAAao/aM7ML7dGznY/s288/IMG_0443.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044610048657662466"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIOHJybIgI/AAAAAAAAAaw/VsUrBmMDHW0/s288/IMG_0444.JPG" /></a><br>
In the mean time, many teams already got accepted 3 to 4 problems
</p>

<h2>Third accepted Problem A+ - Consanguine Calculations (229 Minutes)</h2>

<p>Wow, only 20 minutes elapsed, we got this problem accepted!?! Nope... Actually this problem has the worst story. We need 4 submissions to get it Accepted. Let me describe the silliness one by one.</p>

<p>The simplified problem statement: Given two parents' "ABO Blood Type" (A, B, AB, O) and Rh factor (+, -), determine their children's possible Blood Type and Rh Factor. Whattt?!? it's just another brute-force problem! Of course with added difficulties: you may be given one parent and his child Blood Type and Rh Factor, determine the other parent's Blood Type and Rh Factor. And also, there is some "nasty" (as <a href="http://www.topcoder.com/tc?module=MemberProfile&cr=8357090">misof</a> often said) conversion between the Blood Type and the actual combination (A means AA and AO, B means BB and BO, Rh + means ++ and +-). We have to carefully convert the one to many combinations of the Blood Type when reading the input and convert it again from many to one when outputting the Blood Type and Rh factors.</p>

<p>I code this problem somewhere between the frustrations of RTE and WA of problem G above, hence made me a little paranoid (I should've delegate this coding to Andoko!). So, my fear come true, we got WA for the first submission for this problem. It takes a long time to figure out the bug, since the code is really long! (I should've coded it in Ruby: no code, no error! and make me smarter than I think I am). Then after sometime, we found the bug: I forgot to convert the many to one for the output! Actually I was not forget, but the remove duplicates must be done twice: remove combinations duplicates and after convert it to Blood Types remove the duplicates again (I miss this second step). However, we still got WA! At this time, all of us became paranoid! We started making delusions! We thought the "sentinel" is wrongly handled: the "E N D" could be "E E E" or "E D N" or any thing... so we fix that and actually resubmit it \LOL. Of course this will get another WA :P but we have to make sure :D (entering "WA gak bayar mode").</p>

<p>Just after we got problem G accepted, Andoko instruct me to generate all possible input and print the output. He intended to check it one by one. Not long after I generate the input and run it, there appears the bug: The children's Blood Type is EMPTY! Hore, found the bug! The bug is there because of the second fix I made (the remove duplicate things). I forgot to update the code for a single Blood Type, what a silly and unnecessary mistake!.</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044599560347525570"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIEkpybIcI/AAAAAAAAAaQ/LmjbwALQKyc/s400/IMG_0445.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044599869585170898"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIE2pybIdI/AAAAAAAAAaY/LaUbaeBUbfw/s400/IMG_0447.JPG" /></a><br>
The current standing: Our team got 49th rank with 3 solved problems<br>
And the statistics for each problems also shown
</p>

<p>There was about 71 minutes left (the contest were 5 hours). We attempt to solve 2 more problems (Problem F and C) and it seemed to be not a good idea since the time left were too short. If only everything went well on the first 3 problems, maybe I can get problem F accepted. Since it only need complete-search (A*) algorithm to solve it and I've solved many kinds of problem like that before. The "nasty" things about these world finals problem set is that it requires you to do a lot of coding but the algorithm itself is just brute-force, greedy, complete-search. I'm disappointed with the problem set.</p>

<p>Then the contest ends. By the time the contest ends, I really disappointed with the result. We should've done better than this! In the same <a href="http://forums.topcoder.com/?module=Thread&threadID=568887&start=0&mc=112#773105">TopCoder Thread</a> I mentioned before, there were some teams also have disappointments with the "taste" of the problem sets.</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044597528827994434"><img border="0" src="http://lh3.google.com/image/felix.halim/RgICuZybIUI/AAAAAAAAAZQ/pVTGJf7rjI8/s400/DSC_4350.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044610246226158098"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIOSpybIhI/AAAAAAAAAa4/nia4I6WScF0/s400/IMG_0460.JPG" /></a><br>
Only 3 balloons :(<br>
ardiankp's team approached us for explanation of problem G<br>
Andoko told every scientific process he had with Kurniady to solve problem G<br>
The culprit is the word "consecutive"
</p>

<p>After the contest ends, we met <a href="http://felix-halim.net/blog/2006/5/6/topcoder-open-06-development-is-won-by-sindu">sindu</a> (the Indonesian TopCoder) at the outside of the competition room. Thanks sindu for coming :) Also in the afternoon we met Rudy Raymond Harry, Indonesian that works for IBM Research Tokyo. We discussed how life at IBM Research is.</p>

<p>Around 5PM, the contest results were up and we assembled in the competition room again for the Awards Ceremony.</p>

<p>The Judges decides the cut-off line for the ranks based on the number of solved problems and time. See my previous <a href="http://felix-halim.net/blog/2007/3/19/acm-icpc-world-final-tokyo-japan-2007">blog post</a> for the contest results. The Top 12 teams were called on to the podium to receive awards. The photos of each 12 teams can be found in <a href="http://icpc.baylor.edu/dmt/ImageBank/">baylor site</a></p>

<p align=center>
Warsaw University got the World Champion! Congratulations!
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044612191846343218"><img border="0" src="http://lh5.google.com/image/felix.halim/RgIQD5ybIjI/AAAAAAAAAbI/WkyE-htO5uo/s400/DSC_4528.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044612393709806162"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIQPpybIlI/AAAAAAAAAbU/sMlYq2p3EEo/s400/DSC_4545.JPG" /></a><br>
After the Award Ceremony we had dinner.<br>
Ainun Najib participate in singing during dinner (Left).<br>
Crowds sang Y.M.C.A (Right)
</p>

<p>Bill Poucher also sang and then invited us all to the Surprise event. The surprise event was Chinese Acrobatic performances, <a href="http://www.bobarno.com/">Pickpocket Entertainer Lecturer, Bob Arno</a>, <a href="http://www.google.co.id/search?q=Wally+Eastwood&ie=utf-8&oe=utf-8&aq=t&rls=org.mozilla:en-US:official&client=firefox-a">Piano Playing Jugglers, Wally Eastwood</a>, and another Chinese Acrobatic performance.</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044623483315364914"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIaVJybJDI/AAAAAAAAAfw/1uodeDtUC6s/s400/IMG_0043.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044612479609152098"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIQUpybImI/AAAAAAAAAbc/AkmyylybQNY/s400/DSC_4547.JPG" /></a><br>
The IBM's Celebration, the surprise event, opened with drum performance
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044612685767582354"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIQgpybIpI/AAAAAAAAAb0/-KgryM5aFJQ/s400/DSC_4573.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044613016480064162"><img border="0" src="http://lh5.google.com/image/felix.halim/RgIQz5ybIqI/AAAAAAAAAb8/OJ7j8SjYU7Q/s400/DSC_4576.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044616014367236930"><img border="0" src="http://lh3.google.com/image/felix.halim/RgITiZybI0I/AAAAAAAAAdc/oMaZHDzmpiA/s400/DSC_4624.JPG" /></a><br>
The first performance is Chinese World Class Acrobatics
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044613643545289394"><img border="0" src="http://lh3.google.com/image/felix.halim/RgIRYZybIrI/AAAAAAAAAcE/B50wCwPns6c/s400/DSC_4599.JPG" /></a><br>
The second is <a href="http://www.bobarno.com/">Pickpocket Entertainer Lecturer Bob Arno</a><br>
See the part of his action below
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044613750919471810"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIRepybIsI/AAAAAAAAAcM/mJu_-v0QjIw/s400/DSC_4601.JPG" /></a><br>
Whose "Cheap" watches are these belong to?!? You go to IBM using these watches!?!<br>
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044613793869144786"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIRhJybItI/AAAAAAAAAcU/T_A87TpTFro/s400/DSC_4602.JPG" /></a><br>
I'm just warming up here!<br>
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044613841113785058"><img border="0" src="http://lh5.google.com/image/felix.halim/RgIRj5ybIuI/AAAAAAAAAcc/oCktmYMxHNU/s400/DSC_4603.JPG" /></a><br>
Are you missing your wallet? (after went off the stage, he didn't realize that his tie was stolen)<br>
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044613974257771250"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIRrpybIvI/AAAAAAAAAck/vrThGIc3sro/s400/DSC_4607.JPG" /></a><br>
Ok, whose underwear should I steal?<br>
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044614021502411522"><img border="0" src="http://lh3.google.com/image/felix.halim/RgIRuZybIwI/AAAAAAAAAcs/McxawAHeKnU/s400/DSC_4608.JPG" /></a><br>
Bob Arno: "Relax, I won't TOUCH anything."<br>
This is funny because John Clevenger said this repeatedly in practice session: "Do not TOUCH anything!".<br>
Hearing Bob Arno saying "I won't TOUCH anything" made the audience laughing hard. It's just clicks!<br>
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044614541193454370"><img border="0" src="http://lh4.google.com/image/felix.halim/RgISMpybIyI/AAAAAAAAAc8/WJ6FHk-wb3w/s400/DSC_4610.JPG" /></a><br>
Whoops.. my underwear!
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044615589165474610"><img border="0" src="http://lh4.google.com/image/felix.halim/RgITJpybIzI/AAAAAAAAAdI/nNYBhUSsUW4/s400/DSC_4611.JPG" /></a><br>
Thank you very much Bob Arno!
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044616315014947682"><img border="0" src="http://lh5.google.com/image/felix.halim/RgITz5ybI2I/AAAAAAAAAds/TtPpHYXIqJc/s288/DSC_4647.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044616439568999282"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIT7JybI3I/AAAAAAAAAd0/z-pidouJ3sI/s288/DSC_4656.JPG" /></a><br>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044616821821088674"><img border="0" src="http://lh3.google.com/image/felix.halim/RgIURZybI6I/AAAAAAAAAeM/pn029XannqA/s288/DSC_4664.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044616985029845938"><img border="0" src="http://lh5.google.com/image/felix.halim/RgIUa5ybI7I/AAAAAAAAAeU/l1NryTP7o-8/s288/DSC_4678.JPG" /></a><br>
<a href="http://www.google.co.id/search?q=Wally+Eastwood&ie=utf-8&oe=utf-8&aq=t&rls=org.mozilla:en-US:official&client=firefox-a">Wally Eastwood, World Fastest Jugglers</a>
</p>


<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044617418821542850"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIU0JybI8I/AAAAAAAAAec/Ek1gWV9-jXo/s288/DSC_4683.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044617461771215826"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIU2pybI9I/AAAAAAAAAek/_Wr87YpIJnw/s288/DSC_4685.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044617504720888802"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIU5JybI-I/AAAAAAAAAes/YHpm2zJkrmA/s288/DSC_4688.JPG" /></a>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044617607800103922"><img border="0" src="http://lh6.google.com/image/felix.halim/RgIU_JybI_I/AAAAAAAAAe0/wBfsCVMR868/s288/DSC_4692.JPG" /></a><br>
Continued with another Chinese Acrobatics
</p>

<p align=center>
<a href="http://picasaweb.google.com/felix.halim/ACMICPCWorldFinal2007Day4/photo#5044618045886768130"><img border="0" src="http://lh4.google.com/image/felix.halim/RgIVYpybJAI/AAAAAAAAAe8/Uf-u8eMS-Rs/s800/DSC_4698.JPG" /></a><br>
Thank you very much for all the performers, I enjoyed the show!
</p>

<p align=right>Next : <a href="day5.php">Day 5, Breakfast and leave (March 16, 2007)</a></p>
<p align=right>Back to : <a href="day3.php">Day 3, Practice sessions, Japanese Cultural Experience, and CyberCafe (March 14, 2007)</a></p>
<br><br>

<div include-html='footer.php'></div>
<script>include_htmls();</script>
