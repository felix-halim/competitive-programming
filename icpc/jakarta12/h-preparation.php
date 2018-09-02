<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Problem H - Alien Abduction (ICPC Regional Jakarta 2012) :: Felix Halim .NET</title>
  <meta name="author" content="Felix Halim">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="/images/fh.jpg">
  <link rel="stylesheet" type="text/css" href="/styles.css">
  <script src="/script.js"></script>
</head>

<body>
<script>document.write(toolbar_template());</script>

<div style="max-width:990px; margin:0 auto">

<h1>Problem H - Alien Abduction</h1>

<iframe style="float:right; margin:0 0 15px 15px" width="400" height="300" src="https://www.youtube.com/embed/h6B6Vjtcyf4" frameborder="0" allowfullscreen></iframe>

<p>During the <a target="_blank" href="https://www.youtube.com/watch?v=h6B6Vjtcyf4">interview with the champion team (+1 ironwood branch)</a>, 
<a target="_blank" class="external" href="http://codeforces.com/profile/peter50216">Pi-Hsun (Peter) Shih</a>
said that his favorite problem is <a target="_blank" href="icpc12jak-h-alien.pdf">problem H</a> (this problem).
I should've asked why did he like it? is it because of the problem statement?
or because he had fun in writing the solution :).
Anyway, this problem is set by me and I would like to tell you how
this problem was created / prepared. 
</p>

<p>Initially, this problem was set to be "easier", that a simple
<a target="_blank" class="external" href="http://en.wikipedia.org/wiki/K-d_tree">K-d Tree</a> or
<a target="_blank" class="external" href="http://en.wikipedia.org/wiki/Quadtree">Quadtree</a>
solution will work fine.
However, since <a target="_blank" class="external" href="icpc12jak-d-retrench.pdf">Problem D</a>
is already using K-d Tree for finding the nearest neighbors,
to give good variations to the problemset,
I rewrote this problem so that it is NOT solvable using (static) K-d Tree nor Quadtree
(unless you are able to code "dynamic" K-d Tree / Quadtree in contest time :P).
</p>

<p>This problem is solvable using <a target="_blank" class="external" href="http://en.wikipedia.org/wiki/Range_tree">Range Tree</a>.
I taught Range Tree during Pelatnas (training camp) 3 TOKI 2012 to <a target="_blank" class="external" href="http://www.toki.or.id/2012/8-peserta-lolos-ke-pelatnas-3-toki-2012/">8 of Indonesian students</a> to prepare them for IOI 2012. There are several other students from University of Indonesia were present during the training camp and those same students were participating in ICPC Jakarta 2012. I was surprised that they didn't get this problem accepted in contest time!
</p>

<p>I think Range Tree is a rare problem in programming contest.
I won't discuss it in detail here, since it is a classic algorithm
in computational geometry, you can search for it to learn more.
Perhaps it will be included in the next version of the 
<a target="_blank" class="external" href="https://sites.google.com/site/stevenhalim/">Competitive Programming Book</a>.
Rare problems like this usually become the "decider problems"
that set apart teams at the top.
</p>

<p><a target="_blank" class="external" href="http://competition.binus.ac.id/icpc2012/result/final">Many (inexperienced) teams</a> were submitting naive 
(not even clever) brute-force solutions O(N*Q).
Of course they will get "No - Time Limit Exceeded" reply.
Then, they tried optimizing on reading the input more efficiently,
optimize the loop, etc, but the complexity is still the same O(N*Q).
This problem can be a time-waster for inexperienced teams.
As the problem setter, I feel sorry for them.
</p>

<p>I'd like to talk about how this problem was prepared,
to give you an idea what is it like to be a problem setter.
It took me a lot of time to prepare, especially for the test data
since I have to kill off simple/clever brute-force solutions.
Moreover, I have to kill off solutions using (static) K-d Tree and Quadtree :)
</p>

<p>For the test cases, I prepared 4 types of tests:
<ol>
<li>To kill off plain bruteforce solutions O(Q*N), a simple random positions and random
alien abductions positions and energy will do.
However, if we keep the people positions in sorted order,
O(Q*N) solution can run pretty fast! So,
<li>To kill off brute force solutions with sorted Xi and Yi coordinate,
I created tests where the positions of the people have very close to
each other in X coordinate but random in Y coordinate, and vice-versa. 
Thus bruteforce solutions that sort by X will still have to iterate many Y positions, and vice-versa.
However, if we localized the coordinates, that is, by grouping all people
in nearby coordinate (within 1000 distance), 
then you can prune a lot of people (given the energy and position of the alien ship),
and thus the first two kinds of test case can run pretty fast! So,
<li>To kill off nearby/localized spatial indexing solutions,
I created test cases where all the people are in coordinate (0 &lt;= Xi,Yi &lt 1000)
and all the alien abductions operations are everywhere randomly with very large energy,
but so that no abduction is happening.
This will force the all local groups to be scanned every query
because the energy is large enough to cover all the group in one axis or another (but not both).
With these three kinds of tests, I am still concerned that K-d tree or Quadtree indexing
will pass. So,
<li>To kill off K-d Tree and Quadtree solutions,
I set the positions of all people to (0 &lt;= Xi,Yi &lt 10) initially.
Then, I move (using the alien abduction operation)
the person with identifier = 1 to the right 7000 times,
and then move it 8000 times on the other (perpendicular) axis.
Then, the next alien abduction operation will spread randomly
the rest of the people all over the Earth.
Then followed by a random alien abductions as in the first kind of testcase.
So, if you were to index the INITIAL positions using (static) indexing data structure,
and you don't rebalance your index tree during the translation,
your index will be very skewed and unbalanced once they are translated 
and scattered to another part of Earth with clean index.
This test case also kills off those who don't actually 
delete nodes from the K-d Tree / Quadtree (i.e, you flag the nodes as deleted),
because the alien abductions will cover the initial positions often,
and thus those "ghost nodes" will be revisited again and again 
if they are only flagged (not deleted).
<li>If the contestants are cleverer than this, 
I will happily accept their solutions :)
</ol>
</p>

<p>There is one team I know (Azureus_HKU) using a clever brute-force
that I didn't anticipate.
They create a multimap for each x-coordinate,
so for each x-coordinate they can know wheater there are people
abducted in log(N), by binary searching the y-coordinate.
But fortunately, the 3rd kind of testcase above also kills of this solution :).
This clever brute-force algorithm can still run in O(1000*Q*log(N))
if the input is like this:
all people are at coordinate between (0 &lt;= Xi,Yi &lt 1000)
and the alien abduction operations are at Xk = 5000, Yk = 0, Ek = 4000.
What will happen is that each query, you need to scan/iterate all 1000
distinct X coordinate (and immediately find that the Y coordinate is not qualified).
Thus it will need to iterate Q*1000*log(N) = 50000 * 1000 * 10 = TLE.
It took 15+ seconds, while the Range Tree solution is around 5 seconds.
BTW, the time limit for the problem is 10 seconds, which is quite generous :)
<p>

<p>This is the <a target="_blank" href="h_gen.java">input generator for problem H</a>.
You can try to test whether your bruteforce solution will pass the 10 second time limit.
Remember to compile your C++ program WITHOUT using any optimizations.
</p>

<p>So how does this Range Tree solution works? you asked.
Well, we have to wait for our beloved chief of judge,
<a target="_blank" class="external" href="https://www.facebook.com/suhendry.effendy">Suhendry Effendy</a>,
to write a blog post about it.
Please kindly remind him every now and then, because he often forgot to blog >:D.
</p>

<div id="disqus_thread"></div>
<script>
// var disqus_config = function () {
//   this.page.url = 'https://felix-halim.net/story/icpc12/h-preparation.php';
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
