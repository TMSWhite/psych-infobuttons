<?php if (!isset($drug) or trim($drug) == "") { ?>
	<font size="+2" color="red"><b>Please type a drug name above and click <i>Search</i>, or click on one of the links</b></font>
<?php } else { ?>

<font size="2" color="#191970">You Just Requested The Following Drug Name:&nbsp;<font size="3" color=red><b><u><?php echo $drug; ?></u></b></font></font>
<h4>A to Z Drug Facts from <font color="#006400">SkolarMD</font></h4><u><--Currently the links have EXPIRED!</u>

<HR NOSHADE>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=dosage") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=dosage"); ?>">(1)What is the Route/Dosage?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=indications") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=indications"); ?>">(2)What are the Indications?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=contraindications") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=contraindications"); ?>">(3)What are the Contraindications?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=adversereactions") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=adversereactions"); ?>">(4)What are the Adverse Reactions?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=class") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=class"); ?>">(5)What Drug Class Does this Drug Fall Under?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=actions") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=actions"); ?>">(6)How does it Work(Pharmakology/Kinetics)?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=interactions") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=interactions"); ?>">(7)What are its Drug Interactions?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=labtestinterferences") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=labtestinterferences"); ?>">(8)How can it Interfere with Lab Tests?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=precautions") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=precautions"); ?>">(9)What are the Precautions?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&query=" .  $drug .  "&resource=atoz&caption=patientcare") . "&iquery=" . urlencode("affilid=omhcolumbia&query=" .  $drug . "&resource=atoz&caption=patientcare"); ?>">(10)What Additional Patient Care considerations are there<br>(Sign of Overdosage, Assessment/Interventions, Patient Information)?</a>


<HR NOSHADE>
<h4>Other Resources from <font color="#006400">SkolarMD:</font></h4><u><--Currently the links have EXPIRED!</u>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=CLINEGUIDE") .  "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=CLINEGUIDE");?>"><font color="8b0000">Clin-eguide:</font>What does it say about this Drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=fdawatch") .  "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=fdawatch");?>"><font color="bdb76b">FDA Alert:</font>What does it say about this Drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=fivemcc") .  "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=fivemcc");?>"><font color="ff00ff">Griffith's 5 Minutes Clinical Consult:</font>What does it say About This Drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=harrison") .  "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&resource=harrison");?>"><font color="9400d3">Harrison's Principles of Internal Medicine:</font>What does it say?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://www.efactsonline.com/Fac/servlet/WordSearch?submit=sumbit&x=0&y=0&word1=" . $drug . "") . "&iquery=" . urlencode("submit=submit&x=0&y=0&word1=" . $drug . "");?>"><font color="4682b4">eFacts:</font>What does it say about this Drug?</a>

<HR NOSHADE>
<h4>Category Listings from <font color="#006400">SkolarMD:</font></h4><u><--Currently the linkx have EXPIRED!</u>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&format=xml&level=category") . "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&format=xml&level=category");?>"><font color="ff6347">XML Format:</font>Categories listings from SkolarMD</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=TEXTBOOK") . "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=TEXTBOOK");?>"><font color="9acd32">TextBooks:</font>What are Available?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=DRUGDB") . "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=DRUGDB");?>"><font color="bc8f8f">Other Info:</font>What about this Drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=ALLGUIDELINES") . "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=ALLGUIDELINES");?>"><font color="ff8c00">Evidence-based Medicine and Guidelines:</font>What are out there?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=FULLTEXT") . "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=FULLTEXT");?>"><font color="000080">MEDLINE:</font>What does it say about this Drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=PTEDU") . "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=PTEDU");?>"><font color="00ff7f">Patient Education:</font>What are there?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://md.skolar.com/gateway?affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=SPCL_CNT") . "&iquery=" . urlencode("affilid=omhcolumbia&uid=omhcolumbia&query=" . $drug . "&category=SPCL_CNT");?>"><font color="9400d3">Web Content:</font>What is this Drug?</a>

<HR NOSHADE>
<h4>Other Helpful Related Links</h4><u><--These links STILL WORK!</u>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://www.rxlist.com/cgi/rxlist.cgi?drug=" . $drug . "*") . "&iquery=" . urlencode("drug= . $drug . "*"");?>"><font color="191970">RxList:</font>What does it say about this Drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://www.rxlist.com/cgi/pharmclips2.cgi?keyword=%20%20") .  ucfirst($drug) . urlencode("%20%20&x=y")."&iquery=" . urlencode("keyword=") . "%20%20"  .urlencode(ucfirst($drug)). '%20%20&x=y'; ?>><font color="ff0000">Patient Handout(RxList):</font>What about this drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://www.ncbi.nlm.nih.gov/entrez/query.fcgi?dispmax=20&db=PubMed&cmd=Search&term=" . $drug . "+&doptcmdl=DocSum") . "&iquery=" .urlencode("dispmax=20&db=PubMed&cmd=Search&term=" . $drug . "+&doptcmd1-DocSum");?>"><font color="cd853f">PubMed:</font>What does it say about this Drug?</a><br>

<a target=_blank href="imanager.php?nquery=<?php print urlencode("http://www.guideline.gov/search/searchresults.aspx?Type=3&txtSearch=" . $drug . "&num=10") . "&iquery=" .urlencode("Type=3&txtSearch=" . $drug . "&num=10");?>"><font color="cd5c5c">National Guideline Clearinghouse:</font>What does it say about this Drug?</a><br>

<a target=-blank href="imanager.php?nquery=<?php print urlencode("http://www.thomsonhc.com") . "&iquery=" .urlencode("");?>"><font color="9acd32">Micromedex:</font>What's in Thomson Link?</a>

<?php } ?>
