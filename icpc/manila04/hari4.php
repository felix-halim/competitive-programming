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

<p>Hari ini tanding nich!!</p>
<p align=center><img src="breakfast01.jpg"><br>Ini breakfast di Hotel Richmonde, makan sepuasnya di pagi hari
<p align=center><img src="breakfast02.jpg"><br>Makan yang banyak sebelon tanding... biar bertenaga :o

<p>Tibalah saatnya untuk tanding, jam 12 siang, semua team login ke PC2 (system untuk contest), dan dimulai lah contestnya. Berikut adalah cerita team Lenix ngesolve soal2nya (technical knowledge needed)</p>

<p>Dibagikan 8 soal (A sampai H), mereka semua tidak teralu susah yang dibutuhkan hanyalah kecepatan coding dan kecepatan membaca dan mengerti soal dan keahlian membuat soal tanpa debug!</p>

<p>The problems can be downloaded here: <a href="http://www.myuap.net/acm/acm2k4_mnl.pdf">http://www.myuap.net/acm/acm2k4_mnl.pdf</a></p>

<h2>Our First AC Problem</h2>

<p>Permulaan yang baik oleh AN dalam mensolve problem C - Prize Hop. Sepertinya memakai DP biasa, no problemo. Semua langsung semangat gara2 bisa solve dengan cepat :o</p>

<p>Setelah 1 jam berlalu... loh.. kok gak ada soal berikutnya yang AC yah?? gimana nichh???</p>

<h2>Our Second AC Problem</h2>

<p>Di tengah kebingungan, 2 jam telah berlalu... wah parah juga... kita disini udah pada kesel2 ama eclipse nya... ngecompile aja setengah mati... tutup project buka project... setting run sini setting run sono... bah buang waktu abiss!!! Coba ada editplus... :P</p>

<p>Setelah berulang kali di print, akhirnya problem D - Pattern Matching Accepted juga! Gembel banget... pertama2 salah di e[i] harusnya e[j]... lalu setelah dibenerin masih ngaco... di print lagi.. ehh kurang satu "break" statement... ehh masih ngaco... print lagi... aduh gak ketemu!!! akhirnya kepaksa debug di computer langsung pake printf! Gak taunya string yang harusnya sama waktu dicompare gak sama!?!?!? kenapa pula itu? ternyata harus remove newline sebelon string compare!!! Dan untungnya, jurinya baik, jadi pas nanya: "Input entries urutan ama output robot", si juri bilang Yes, langsung g submit aja... dan langsung AC juga hokinya...</p>

<h2>Our Third AC problem</h2>

<p>Setelah problem D got Accepted (FH yg solve), semangat agak naik sedikit... g lalu gangguin si AN gara2 abis g solve problem D, g pengen ke problem F - Prime Graphing... dan gua ama LG gak tau itu problem maksudnya apaan... Tapi pas si AN gua tanya dia bilang... wah gak tau juga (padahal blon liat soalnya), si AN masih kutak kutik problem B, si LG lagi kutak kutik problem G ama A. Wah parah... di sekeliling udah pada solve 3-4 problems... dan pas liat rangking... wahh kok 10 besar gak masuk yah?? parah parah... was wes wos...</p>

<p>Yah akhirnya setelah membuang beberapa menit akhirnya AN baca juga soal F, dan langsung bilang gampang banget?!!??!  Lima menit dia coding, langsung submit... langsung AC! Bravo AN! Langsung naek peringkat jadi peringkat 12... (kalo gak salah saat ini baru di Freeze ranklistnya)</p>

<h2>Our Fourth AC problem</h2>

<p>Duh... problem yang masih di-kutak-kutik ini problem A, B, dan G. LG lagi bikin problem G dan programnya RTE pas inputnya lebih besar... hmm... print untuk di analyze ama g (soalnya rekursi sich). Si LG ternyata gabungin rekursi untuk find longest DNA sama print DNA... jadi agak pusing liatnya... Ya udah gua langsung suruh dipisah aja functionnya... jadi 2 functions. Akhirnya berjalan mulus dan tidak ada hambatan... submit aja...</p>

<p>Tapi setelah ditunggu beberapa saat... kok jurinya gak bales bales kelanjutan problem G ini yah??? anehhh... yah udah kita gak mau buang2 waktu... langsung proceed aja ke problem berikutnya... </p>

<h2>Our Fifth AC problem</h2>

<p>Problem paling gampang yang team2 laen di depan meja kita udah solve, tapi kita belon solve!!! Gembel banget deh... salah strategi ngerjain soal. (harusnya pindah ke soal gampang dulu, tapi masih pada stuck dan penasaran sama soal2 yang lain yang setengah selesai! ini sangat mengurangi bonus points!!! terutama bonus points untuk problem A yang harusnya besar!).</p>

<p>LG udah buat problem A di tengah perjalanan dan submit tapi WA, ternyata setelah dianalisa, programnya RTE kalo inputnya besar. Di printlah itu source code, dan g bantuin liat salahnya dimana, dan si AN masih fokus ke problem B. Setelah g liat2 pun masih OK itu program... ampe bingung kenapa errornya... Untunglah waktu itu ada titik terang... kita coba untuk berbagai testcase... dan menemukan bahwa si LG lupa initialize ulang string variable penampungnya... jadi RTE mulu... setelah di submit... AC lah itu problem... huff.. </p>

<h2>The last minutes</h2>

<p>Masih ada 30 menit terakhir... dan problem B - Loaded Dice, masih berpotensi untuk di solve! Pikirnya kalo solve ini problem, bisa jadi peringkat 1 :P (waktu itu kirain kalo bisa solve 6 udah peringkat 1).</p>

<p>Si AN dah temuin rumus entah darimana untuk problem B ini... dan keliatannya udah pasti bener katanya... soalnya "Brute Force" hanya punya 2 reply: "Time Limit Exceeded" atau "Accepted"!! Tapi entah kenapa replynya itu "Wrong Answer"!?!?!?  Mulailah kita bertiga kesel setengah mati ama problem terakhir ini! Soalnya udah gak ada waktu untuk kerjain problem lain lagi...</p>

<p>Kekeselan ini pernah terjadi tahun lalu, yaitu tentang Precision Error! kenapa Problem setternya manila suka ama precission error yah???? kesel deh... Di output ditulis gini: <i>"Lastly, print the absolute probability of the occurrence of the sum, accurate to 3 decimal places, rounding off if necessary. Print any trailing zeroes. In case of a tie, print out the probability of one sum."</i> Kata kata "rounding off if necessary" itu sangat menyebalkan. Apakah itu artinya pembulatan biasa? ato pemotongan di akhir digit ke-3? Trus apakah 1.000 harus di tulis 1 saja? Grrr... gak jelas banget maunya apa itu kalimat!!! Setelah dicoba berbagai kemungkinan, yah disubmit aja deh semuanya... hhh...</p>

<h2>Contest time is now over</h2>

<p>Setelah selesai, team UI, Untar, ama Binus langsung ngerumpi ngebahas soal2 dan jawaban2... lalu foto2 dech...</p>

<p align=center><img src="aftercontest01.jpg"><br>Dapet 4 baloons untuk problem A,C,D,F (yang G belon di judge)</p>
<p align=center><img src="aftercontest02.jpg"><br>Foto sekali lagi di tempat yang ada logonya :)</p>

<p align=center><img src="untar_binus_ui.jpg"><br>Foto rame2: Untar, Binus ama UI bersama balon2 nya :)</p>

<p>Lalu kita semua makan dulu di Gymnasiumnya lalu head ke auditoriumnya (g lebih prefer panggil Theatre nya). Disinilah acara pembagian hadiah dilakukan. Kita semua berharap gak dipanggil maju kedepan sebelon waktu pemanggilan 10 besar :)</p>

<p align=center><img src="aftercontest03.jpg"><br>Dapat dilihat suasana di Theatre ini, banyak yang membawa baloons!!</p>

<p>Mulailah dipanggil nama team2 dari bawah ke atas. Dan akhirnya tiba di 10 besar... UI dan Binus belon dipanggil... ini pertanda masuk 10 besar. Dan 10 besar ini dipanggil maju ke podium dan dibacain lagi dari peringkat 10 ke 6.</p>

<p align=center><img src="award01.jpg"><br>Ini kita was wes wos... bakal peringkat ke berapa nih yah jadinya???
<p align=center><img src="award02.jpg"><br>Sebelah kiri kita ada team Ateneo, di kanan ada team UI dan Donghua
<p align=center><img src="award03.jpg"><br>Foto dulu donk :) si Ilham di kanan.
<p align=center><img src="award04.jpg"><br>Akh... sial dipanggil... jadi ke-6 dehh... kepaksa salaman... maunya ke 1!!<br>LG ama AN keliatannya lesu... semua lesu... nasib...


<p>Kita pulang dengan lesu... (g gak tau yang lain... tapi perasaan gua lesu aja). Gak sesuai target utama sich soalnya... dan kita masih merasa bisa "lebih baik dari ini". Kalau tahun lalu udah bisa masuk 10 besar aja udah hoki! karena soal terakhir itu harusnya gak AC, tapi dianggep AC. Yah jadi begitulah... lesu nih...</p>

<p>Sesampai di hotel kita keliling2 hotel pake lift... kunjungin semua lantai :) dasar gak ada kerjaan...</p>

<p align=center><img src="lift01.jpg"><br>Pencet semuaaaa... enak sih tombolnya sensitif :) Duh masih ada satu yang mati
<p align=center><img src="lift02.jpg"><br>Nah... semua lantai menyalaa hehehehe!


<br><br><br><br>
<p align=right>Lanjut : <a href=hari5.php>Day 5, Back to Jakarta</a>
<p align=right>Kembali : <a href=index2.php>Index</a>
<br><br>
