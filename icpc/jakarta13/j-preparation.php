<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Problem J - Alien Abduction Again (ICPC Regional Jakarta 2013) :: Felix Halim .NET</title>
  <meta name="author" content="Felix Halim">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/fh.jpg">
  <link rel="stylesheet" type="text/css" href="/styles.css">
  <script src="/script.js"></script>
</head>

<body>
<script>document.write(toolbar_template());</script>

<div style="max-width:990px; margin:0 auto">

<h1>ICPC Jakarta 2013 - Problem J - Alien Abduction Again</h1>

<p>Last year contestants (or contestants who practiced with last year ICPC Jakarta 2012 problemset)
should immediately know, only by looking at the problem title, that this problem is related to last year
<a href="../icpc12/h-preparation.php">Problem H - Alien Abduction</a>.
Also, they should have guessed that this problem is either as hard, or harder than last year :D.</p>

<p>It took me several weeks to come up with this problem (and the solution). My criterion for the problem are:
<ul>
<li>The problem must be <b>hard</b>.
This is necessary to avoid the embarrasement (to the problem-setters) that some teams sweept clean all the problems in 3 hours >.&lt;
(yes I'm talking about you, +1 ironwood branch).
<li>The problem must be a <b>rare</b> problem. That is, I want it to be the decider problem to separate the teams at the top.
I do not want to pick the problem from the Competitive Programming Book Chapter 9 - Rare Topics, because it would be too obvious :P.
<li>The problem must <b>have a secret message</b>.
Well... the secret message is meaningless for any contestants
(i.e., the message will not help anyone to gain better insight in solving the problem).
Instead, the secret message was intended for one of the special guests in the closing ceremony :).
</ul>

<p>Given the criterion above, how should I write the problem?
I search for inspiration by reading blogs, TopCoder forum posts, etc.
After two weeks I decided to write a BIT (Binary Indexed Tree) with range update.
I always surprised by BIT that it can be used differently than its original design (prefix sums).
For example, BIT can be used to compute range minimum query, and range updates too
(see <a target="_blank" class="external" href="http://petr-mitrichev.blogspot.sg/2013/05/fenwick-tree-range-updates.html">Petr Mitrichev blog</a> as well as the links in the comments section).
</p>

<img style="float:right" src="jph.png">

<p>In short, the problem statement is like this (<a target="_blank" href="http://suhendry.net/contest/icpc13jak/icpc13jak-j.pdf">Click here to see the full problem statement</a>):

<blockquote>
Given lines/curves segments as a set of functions f<sub>p</sub>(x) = ax<sup>3</sup> + bx<sup>2</sup> + cx + d, 
each on a range [x1<sub>p</sub>, x2<sub>p</sub>], what is the total sum of the y-values of the points 
(generated by the functions) with integral x-values in range [x1, x2] ?
</blockquote>

<p>Naively, this problem can be easily solved using <b>(Lazy) Segment Tree</b> + <b>coordinate compression</b>.
I do not want this solution to pass (remember that I want to create a BIT range update problem).
Coordinate compression is a trick to make the input range smaller by pre-reading all input data and then make it dense.
This will help the Segment Tree solution that it only needs to allocate 100K instead of 1M tuples.
Luckily, there is a trick to make coordinate compression to fail: <b>make it as an interactive problem</b>.
However, ICPC style usually do not involve interactive problems, so I have to uglify the input that
the next input depends on the previous output of the program (i.e., to simulate an interactive problem).
This is the reason that "the space distortion" was introduced every time the transporter is used.
With this, coordinate compression will no longer work, but I agree that this made the problem harder to read.
In fact from the survey, almost half of the teams voted problem J as the least liked problem :(.
I guess that's the price I have to pay.
</p>

<p>What about the (Lazy) Segment Tree? How to make it fail to work?
I know that normally, in programming contests, two solutions with the same complexity should both get Accepted.
But, this problem is an exception.
I made it clear in the problem statement that your solution must be very-very efficient
(otherwise the device will be too late to disrupt the transport operation by the alien ship).
So, <b>constant factor matters in this problem</b>.
I was hoping that the contestants realize that when reading the problem statement.
</p>

<p>
If you are familiar with Segment Tree, you should have an insight how slow it can be.
Thus you should pick solutions with lower constant factor if any (e.g., Binary Indexed Tree).
The Segment Tree solutions run in 5+ seconds while the BIT solutions run in less than 2 seconds.
Moreover, the memory consumption for Segment Tree will exceed 64 MB.
If you recall, in the briefing, Suhendry mentioned that all of the judges solutions use less than 32 MB.
That should give you another hint that Segment Tree is not the way to go.</p>

<p>Unfortunately, due to PC2 inaccuracy in measuring the time limit, some teams got lucky to get it accepted with Segment Tree
(albeit, they need to insanely optimize their code to get it run in 5 seconds).
We set the time limit for this problem to be 4 seconds in the PC2,
but somehow PC2 still accepts solutions with 5 seconds runtime!
I didn't re-adjust the time limit to 3 seconds during the contest and decided to <b>let it be</b>
(otherwise I will be cursed by the accepted teams :P).
</p>

<p>No team solved this problem using BIT range updates.
It is not easy to convert a (Lazy) Segment Tree into BIT range updates.
It probably deserve a problem on its own.
To give an example, consider the simplest case where f(x) = d.
That is, the values for a, b, and c are all zero.
In this case, the problem is equal to a very simple BIT range update.
Here is a nice post on <a target="_blank" href="http://apps.topcoder.com/forums/?module=Thread&threadID=756271&start=0&mc=2#1579597">how to simulate a (Lazy) Segment Tree using two BITs</a>.
We can generalize this for the other powers (a, b, and c) and we will need five BITs.
The runtime for this approach is less than 2 seconds and it consumes only ~20MB memory.
This problem also requires the knowledge of mod-inverse.
That is, you will need to do <a target="_blank" href="http://comeoncodeon.wordpress.com/2011/10/09/modular-multiplicative-inverse/">division with modulo</a> somewhere in the calculation.
</p>

<p>Well, the first two criterion have been fulfilled.
The last criteria is the secret message. I hid the message in plain sight.
No other judge (even the chief of judge) was aware that there was a secret message.
But no worries, the message is meaningless to anyone except me and the intended recipient :).
I really had fun in setting this problem :D.
</p>

<div id="disqus_thread"></div>
<script>
// var disqus_config = function () {
//   this.page.url = 'https://felix-halim.net/story/icpc13/j-preparation.php';
//   this.page.identifier = 1;
// };
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://felixh.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</div>