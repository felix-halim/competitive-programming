<h1>Web Spider</h1>

<h2>Problem Statement</h2>

<p>You are writing software that will spider a web site (that is, it visits all links on the homepage, then visits all links on those pages, etc.), and travels three levels deep. You have a list of all the links found in the first pass, in the second pass, and in the third pass.</p>
<p>You are given a vector <string>, firstPass, containing a list of all the links visited from the home page. They will all be in the form "page", "subfolder/page", "subfolder/subfolder/page", etc. There may be any level of depth to the subfolders.</p>
<p>You are given a vector <string>, secondPass, containing a list of all the links found in the second pass (by visiting the links found on the home page). Each element is of the form "pageNumber address", where pageNumber is the index (from 0) of the page from firstPass on which the link was found. address is formatted similarly to the elements of firstPass, with the added possibility of a subfolder named "..", which means "go to the parent folder". However, ".." can only appear as the first subfolder, or if all the previous subfolders are also "..". So, if the homepage contains a link to "reports/sales.htm", sales.htm is in the reports folder. If that page then contains a link to "products.htm", then products.htm is also in the reports folder. However, if that page contains a link to "../home.htm", then that is a link back to a page in the root folder.</p>
<p>You are finally given a vector <string>, thirdPass, indicating all of the links found in the third pass. It is formatted exactly as in secondPass, but the page numbers here refer to the index of the page from secondPass. In all cases, the links reference will be relative paths. In particular, they will never begin with a '/' character.</p>
<p>You are to return an int indicating the number of distinct pages (not including the initial homepage) visited during this crawl of the web site.</p>

<h2>Definition</h2>

Class: WebSpider<br>
Method: countPages<br>
Parameters: vector <string>, vector <string>, vector <string><br>
Returns: int<br>
Method signature: int countPages(vector <string> firstPass, vector <string> secondPass, vector <string> thirdPass)<br>
(be sure your method is public)<br>
<h2>Notes</h2>
<ul>
<li>The links are all case sensitive, so "home.htm" is different from "home.HTM".
<li>Links may point at directories (see example 1).
</ul>

<h2>Constraints</h2>
<ul>
<li>firstPass will contain between 1 and 50 elements, inclusive.
<li>secondPass and thirdPass will contain between 0 and 50 elements, inclusive.
<li>A link will be formatted as a sequence of letters, numbers, periods and slashes.
<li>No link will contain leading, trailing or double slashes, and the file name will contain at least one letter or number.
<li>Each element of firstPass will be formatted as a single link.
<li>Each element of secondPass and thirdPass will be formatted as an integer with no extra leading zeros, followed by a space and a link.
<li>The integers in secondPass and thirdPass will reference valid pages in firstPass and secondPass, respectively.
<li>None of the links will go above the root directory.
<li>A subfolder containing only periods will only be ".." and is only allowed in secondPass or thirdPass. Furthermore, it must be either the first subfolder or else all the preceding subfolders must also be "..". Hence, links like "reports/../home.htm" and ".../abc.htm" are not allowed.
</ul>

<h2>Examples</h2>

<pre>
0)

{"home.htm", "sitemap.htm", "contact.htm", "support/login.jsp"}
{"2 locations.htm", "3 ../home.htm"}
{"0 contact.htm"}
Returns: 5
</pre>

<p>On the home page, the first pass finds that there are four links: "home.htm", "sitemap.htm", "contact.htm", and "login.jsp". Notice that the login page is in the "support" folder.</p>
<p>On the second pass, we find that the contact page has a link to "locations.htm", and the login page has a link back to the home page (which we have already visited).</p>
<p>On the third (and final) pass, we find that the locations page has a link back to the contact page (which we have already seen).</p>
<p>So, we take account of all pages found on the site: home, sitemap, contact, login, and locations. Thus, there are five pages.</p>

<pre>
1)

{"index.html","products/all/INDEX.HTML","images/products/A101.GIF"}
{"1 ../../index.html","1 ../../products"}
{}
Returns: 4
</pre>

<p>Note that the second link in secondPass is to products, which is the same as a directory name. This is allowed, and should be counted separately.</p>

<pre>
2)

{".rc"}
{}
{}
Returns: 1

3)

{"a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a"}
{"0 a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a"}
{"0 ../a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a",
 "0 ..a/a",
 "0 a../a.."}
Returns: 5

4)

{"abc/ccba","ab/cba","..a"}
{"0 cba","1 ccba"}
{"0 cba","1 ccba"}
Returns: 5

5)

{"a","ab/ab","ab/ab/abc","abc/abc"}
{"0 ab/ab","1 ab","1 ../ab/ab","2 ../../ab/abc"}
{"0 ../ab/ab","2 ../abc/abc","1 ab/ab"}
Returns: 6

6)

{"a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a/a"}
{"0 ../../../../../../../../a/a/a/a/a/a/a/a/a"}
{"0 ../../../../../../../../a/a/a/a/a/a/a/a/a"}
Returns: 1

7)

{"index.asp", "contact.asp", "about/index.asp", "users/support.asp",
 "company/executiveteam.asp", "products/catalog.asp"}
{"1 index.asp", "1 requestinfo.asp", "2 ../index.asp", "2 history.asp",
"3 ../index.asp", "3 helpdesk.asp", "4 ../index.asp", "4 boardofdirectors.asp",
"4 location.asp", "5 ../index.asp", "5 new/index.asp",  "5 ../index.asp", "5 sale.asp"}
{"10 ../../index.asp", "11 products/index.asp", "11 products/catalog.asp"}
Returns: 14
</pre>

<hr>
<p>This problem statement is the exclusive and proprietary property of TopCoder, Inc. Any unauthorized use or reproduction of this information without the prior written consent of TopCoder, Inc. is strictly prohibited. (c)2003, TopCoder, Inc. All rights reserved.</p>
