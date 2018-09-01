<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Day 2, The Contest Begins!! (26 Mar 2005) :: Google Code Jam India 2005</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/fh.jpg">
  <link rel="stylesheet" type="text/css" href="/styles.css">
  <script src="/script.js"></script>
</head>

<body>
<script>document.write(toolbar_template());</script>

<h1>Day 2, The Contest Begins!! (26 Mar 2005)</h1>

<p>Now the contest begins!! We have to solve 3 problems of different points (250, 500, and 1000 points). For you who're curious what's the contest problems look like? Click on the problem name to see the problem statement (but remember not to copy it for other use!). Below is my discussion for each problem:
<ol>
<li><h2>Problem 250: <a href="webspider.php">WebSpider</a></h2>
<p>This is the easiest problem among the three (you can click on the WebSpider link above to view the problem statements). This problem is about google engine crawling a website (google banget sih). You have to build a program to determine the number of unique files in the website that the google engine had crawled! For example, Google engine crawl a website and finished crawling and travels three levels deep. So now google engine has 3 passes (3 pages of the website that has been crawled). The first pass would be the home-page of the website. The second pass would be the page that linked from the home-page. The third pass would be the page that linked from the second pass. (just like DFS..).</p>

<p>Now you have the three pages that google engine has crawled: the page from the first pass, second pass, third pass. In each pages there are links in it, right? Now, you have to write a program that receive input of lists of all the links found in the first pass, in the second pass, and in the third pass and determine the number of unique "files" found... got the idea of the problem now?</p>

<p>The difficulties that arise from this problem is that... There could be a link that refer back to the same page/file. So? eventhough google found a thousand links when crawling a site that does not necessary mean that there is a thousand unique file linked... probably there's only 50 unique file (since many of the links refer to the same file/page). A "file" in this case is a page in a link (for example: a link support/login.jsp in this case, login.jsp is the file or the page). You have to determine the number of unique file from the three passes done by the google engine!</p>

<p>I <b>solve</b> this problem within 1 hour... I just use java.util.HashSet and string manipulation. I convert all the links into an <b>ABSOLUTE</b> path-link then add it to the HashSet, if it turns out to be in the set, the HashSet will ignore it. Therefore the answer is the size of the HashSet :) The examples given by the problem statement was plenty and very clear! I think this problem really2 was a bonus problem!</p>

<li><h2>Problem 500: <a href="tripmapper.php">TripMapper</a></h2>

<p>This problem, TripMapper, I should have known that it's a TrapMapper!! (I mean it's a Trap). A trap for Time Limit! Damn... I thought it was output time oriented... Anyway, you can look at the problem statement by clicking the link of the problem name above.</p>

<p>The second problem worth twice points from the first problem, but?? <b>No One</b> solves this problem during the contest! Most of the submitted code was successfuly challenged by Pascal AN... (including mine). He knew exactly that BFS/DFS/BruteForce will fail on the time :)  (Damn... I thought my Iterative Deepening was impeccable :P)</p>

<p>Ok, let me say something about the problem. The problem is just a regular Shorthest Path problem but what made it different from the regular shortest path is that its <b>DATA STRUCTURE</b>!!! (damn.. they play on the data structure). It's quite hard to translate the "map" to a collections of nodes and edges. I hate intersections!! They present the map with grids 550 x 550. Guess what? I multiplied it again by two to avoid short-circuit for adjacent node. I guess this was the culprit of my TLE. You can look at the problem statement to get the idea of the map.</p>

<p>Conclusion: I should've never touched this problem!</p>

<li><h2>Problem 1000: <a href="conquest.php">Conquest</a></h2>

<p>Guess what? I didn't even have time to read this problem statement! (not enough time). But our number one winner, Ardian KP, brilliantly leaves the 500 problem intact and head directly to attack this problem (which he thought was easier, DP -> his specialty... gimana gak easier?).</p>

<p>Comment: No comment... Ardian, maybe you want to comment on this one? drop me an email : felix.halim@gmail.com</p>

</ol>
</p>


<h2>Links</h2>
<p>Sindux feels that problem 500 is similar with the previous TopCoder contest: 
<a href="http://www.topcoder.com/stat?c=problem_statement&pm=2979&rd=5877">
	http://www.topcoder.com/stat?c=problem_statement&pm=2979&rd=5877
</a>


<br><br>
<p align=right>Next : <a href=day2-3.php>Google Tech Talk & Awards</a></p>
<br><br>

<div include-html="navigation.php"></div>
<script>include_htmls();</script>
