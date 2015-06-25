<?php
/* ---  Icons categories selector --- */

if(!function_exists('ps_generate_icon_cats')) {
	function ps_generate_icon_cats() {
		
		$icon_cats = array(
			'flat-icons'=>'Flat icons',
			'social-media'=> 'Social & Media',
			'business' => 'Business', 
			'communication' => 'Communication', 
			'computer-mobile' => 'Computer & Mobile', 
			'design-writing' => 'Design & Writing', 
			'development' => 'Development',
			'entertainment' => 'Entertainment', 
			'food' => 'Food', 
			'hosting' => 'Hosting', 
			'menu' => 'Menu', 
			'misc' => 'Misc', 
			'multimedia' => 'Multimedia',
			'sport-games' => 'Sport & Games',
			'symbols' => 'Symbols', 
			'time-location' => 'Time & Location'
		);
			
		$output = '';
		$output .= '<select name="icon_cats" class="ps_icon_cats" id="ps_icon_cats">';
		foreach( $icon_cats as $i => $icon_cat )
			{
				$output .= '<option value="' . $i . '">' . $icon_cat . '</option>' . "\n";					
			}
		$output .= '</select>';
		
		return $output;
	}
}

/* ---  Icons arrays for social-icons --- */

$ps_icons['flat-icons'] = array('arrow','bag','bag2','book','calculator','calendar','camera','card','clock','comment','compas','config','console','count','disk','diskette','download','file','film','garbage','graph','letter','lock','love','mail','map','media','money','news','note','notepad','openmail','photo','portfolio','print','responsive','ribbon','safe','shop','statistic','tablet','ticket','truck','tv','ui','upload','upload2','wallet','phone','help','check','search','drop','voicemail','phone2','culture','user','statistic2','map2','flag','football','weather','folder','view');


/* ---  Icons arrays for social-icons --- */

$ps_icons['social-media'] = array('twitter','facebook','google','pinterest','path','evernote','foursquare','yahoo','skype','yelp','feedburner','linkedin','viadeo','xing','myspace','soundcloud','spotify','grooveshark','lastfm','youtube','vimeo','dailymotion','vine','flickr','500px','instagram','wordpress','tumblr','blogger','technorati','reddit','dribbble','stumbleupon','digg','envato','behance','delicious','deviantart','forrst','play','zerply','wikipedia','apple','flattr','github','chimein','friendfeed','newsvine','identica','bebo','zynga','steam','xbox','windows','android','outlook','coderwall','tripadvisor','netcodes','lanyrd','slideshare','buffer','rss','vkontakte','disqus','joomla','email1','email2');


/* ---  Icons arrays for icons --- */


$ps_icons['business'] = array('abacus','addtocart','alertpay','appointment-agenda','bank','barchartalt','barchartasc','barchartdesc','barcode','barrel','bill','bitcoin','bitcoinalt',
'bitcoinsquare','breakable','briefcase','briefcasethree','briefcasetwo','calcdivide','calcequals','calcminus','calcmultiply','calcplus','calculator', 'calculatoralt','calendarthree','canister',
'cartalt','cashregister','coinsalt','coupon','creditcard','desklamp','dollar','dollaralt','dollarsquare','emptycart','euro','euroalt','eurosquare','exchange-currency', 'factory',
'finance','gavel','gift','googlewallet','hryvnia','hryvniaalt','hryvniasquare','invoice','law','mastercard','microsoftoffice','money-cash','moneyalt','moneybag','news','nuclearplant','officechair','paypal','piggybank','playstore','podium','pound','poundalt','poundsquare','projector','pumpjack','purse','qrcode','report','rouble','roublealt','roublesquare','rubberstamp','sale','salealt','shoebox','shopping-cart','shopping','shoppingbag','shoppingcartalt','shredder','skrill','solarpanel','squareapp','statistics','stickynote','stickynotealt','stockdown','stocks','stockup','store','survey','tagalt-pricealt','thissideup','ticket','tie-business','timeline','trolleyempty','trolleyfull','trolleyload','trolleyunload','value-coins','vaultthree','visa','wallet','walletalt','westernunion','windmill','windmillalt','workshirt','yen','yenalt','yensquare');

$ps_icons['communication'] = array('addcomment','addfriend','adduseralt','amazon','archive','at','avatar','avataralt','banuser','banuseralt','basecamp','behance','bing','birthday','blankstare','blogger-blog','bookmark','bookmarkalt','bookmarkfour','bookmarkthree','browser','businesscardalt','callalt','chat','chrome','circlecallincoming','circlecallmissed','circlecalloutgoing','circledribbble','circlefacebook','circlegoogleplus','circleinstagram','circlepath','circlequora','circletwitter','circlevimeo','circlevine','circleyahoo','circlezerply','closetab','closewindow','cmd','comment','commentlove','commentround','commentroundempty','commentroundtyping','commentroundtypingempty','commentsmiley','commenttyping','community','communitysmall','contact-businesscard','copyapp','currents','deletecomment','delicious','designcontest','deviantart','digg','draft','dribbble','dribbblealt','dropbox','emailalt','emailexport','emailforward','emailimport','emailrefresh','emojiangry','emojiconfused','emojicry','emojidead','emojidevil','emojigrin','emojigrinalt','emojisleep','emojismile','emojisorry','emojisurprise','emojiwink','emptystar','envelope','event','evernote','facebook','facebookalt','fbdislike','fblike','feedly','feedlyalt','findfriends','firefox','flickr','flickralt','flickrthree','flipboard','forrst','forumsalt','foursquare','foursquarealt','fullstar','gmail','google','googledrive','googleglass','googleplus','googleplusold','grooveshark','groups-friends','halfstar','hangout','hangouts','happy','hashtag','heart','heartempty-love','heavymetal','hot','inbox','inboxalt','incomingcall','incomingcallalt','instagram','instagramfour','instagramthree','instagramtwo','lastfm','laugh','lifehacker','linkedin','livejournal','livejournalalt','mega','middlefinger','miniangry','miniconfused','minigrin','minilaugh','minisad','minismile','minitongue','minitonguealt','minitonguewink','miniwink','missedcall','missedcallalt','myspace','newtab','newwindow','ninegag','notificationbottom','notificationtop','openid','openshare','outbox','outgoingcall','outgoingcallalt','path','phone-call','phonealt','phonebook','phonebookalt','phonemic','phoneold','photobucket','picasa','pinterest','pluscircles','plusgames','pluspages','pocket','post','postalt','pushbullet','quora','quote','rdio','reademail','reademailalt','reddit','removefriend','removeuseralt','rss','sad','share-alt','share','sharealt','sharethree','skype','skypeaway','skypebusy','skypeoffline','skypeonline','smile','spotify','squarebookmark','squarecomment','squaredribbble','squareheart','squarelike','squarequora','squarestar','squaretwitter','squareviber','squarevimeo','squarezerply','star-empty','star','stumbleupon','tagged','tagvertical','teamviewer','technorati','theverge','thinking','thumbs-down','thumbs-up','tumblr','twitter','user','useralt','viber','vimeo','vineapp','vineappalt','vk','whatsapp','whatsappalt','yahoo','yelp','youtube','zerply');

$ps_icons['computer-mobile'] = array('acsource','addfolderalt','alienware','android','antenna','apple','archlinux','batteryaltcharging','batteryaltfull','batteryaltsixty','batteryaltthird','batterycharged','batterycharging','batteryeighty','batteryempty','batteryforty','batteryfull','batterysixty','batterytwenty','blackberry','bluetooth','bluetoothconnected','brightness','brightnessalt','brightnessaltauto','brightnessaltfull','brightnessalthalf','brightnessfull','brightnesshalf','capacitator','cd-dvd','circleadd','circledelete','circleselect','clipboard-paste','compress','connected','connectedpc','copy','createfile','createfolder','cursor','cut-scissors','dcsource','defragment','deletefile','deletefolder','deletefolderalt','details','detailsalt','dialpad','diode','document','doubletap','download-alt','download','editalt','elementaryos','explorerwindow','favoritefile','favoritefolder','file','finder','firewire','folder-close','folder-open','folderalt','foldertree','fourg','gpu-graphicscard','hand-down','hand-left','hand-right','hand-up','handdrag','handexpand','handpinch','handswipe','handtwofingers','hddalt','hourglassalt','imac','install','iphone','keyboard','keyboardalt','lan','laptop','list','loading-hourglass','lockalt-keyhole','macpro','menu','microsd','miui','mobile','monitor','mouse','mousealt','mutealt','mymusic','mypictures','myvideos','network','networksignal','networksignalalt','nexus','nfc','notes','notification','off','openfolderalt','packarchive','pebble','phonescreensize','plug','powerjack','powerplug','presentation','print','processorthree','programclose','programok','rar','raspberrypi','removefolderalt','resistor','restart','router','routeralt','save-floppy','screenshot','sd','search','searchdocument','searchfolder','sharedfile','shutdown','sidebar','signal','sim','simalt','simcardthree','spreadsheet','swipedown','swipeup','syncalt','systemfolder','tablet','tabletscreensize','tectile','terminal','terminalalt','tethering','th-large','th-list','th','threeg','touchpad','trash','trashempty','trashfull','treediagram','trojan','twofingerswipedown','twofingerswipeup','twog','ubuntu','unpackarchive','upload','uploadalt','usb','usbalt','usbflash','usbplug','vinyl','volume-down','volume-off','volume-up','webcam','webcamalt','wifi','windowseight','zip');

$ps_icons['design-writing'] = array('addshape','adjust','adobe','align-center','align-justify','align-left','align-right','alignbottomedge','alignhorizontalcenter','alignleftedge','alignrightedge','aligntopedge','alignverticalcenter','angle','bold','book','bookalt','bottomborder','bringforward','bringtofront','brush','bucket','caligraphy','canvas','canvasrulers','circleselection','clearformatting','colors','copyright','crayon','creativecommons','crop','cube','design','distributehorizontalcenters','distributeverticalcenters','dotlist','dreamweaver','elipse','eraser','excludeshape','exposure','eyedropper','featheralt-write','flash','flashplayer','fliphorizontal','flipvertical','font','fontcaligraphy','fontcase','fontcomic','fontgothic','fonthandwriting','fontrounded','fontsansserif','fontserif','fontstencil','fonttypewriter','fullborders','gradient','hexagon-polygon','horizontalborder','illustrator','indent-left','indent-right','indentleftalt','indentrightalt','ink','inkpen','innerborders','insertbarchart','insertpicture','insertpicturecenter','insertpictureleft','insertpictureright','insertpiechart','intersectshape','invert','italic','kerning','lasso','layerorder','layerorderdown','layerorderup','layers','layersalt','layersthree','leftborder','lens','line','lineheight','macro-plant','magazine','marker','mergeshapes','moleskine','noborders','notebook','numberlist','outerborders','pagebreak','paintbrush','paintroll','paintrollalt','palette-painting','pattern','pen','pencil','photonineframes','photoshop','piano','picture','pilcrow','polygonlasso','portrait','precisecursor','rectangle','resize','resizedownleft','resizedownright','resizeupleft','resizeupright','rightborder','rotateclockwise','rotatecounterclockwise','roundrectangle','ruler','selection-rectangleselection','selectionadd','selectionintersect','selectionremove','selectionsymbol','sendbackward','sendtoback','shapes','skitch','snaptodot','snaptogrid','sortbynameascending-atoz','sortbynamedescending-ztoa','sortbysizeascending','sortbysizedescending','sphere','spray','sticker','strikethrough','subscript','subtractshape','superscript','text-height','text-width','textcursor','textfield','textlayer','texture','threecolumns','threed','topborder','transform','triangle','twocolumnsleft','twocolumnsleftalt','twocolumnsright','twocolumnsrightalt','underline','vector','vectoralt','verticalborder','wacom','wizardalt');

$ps_icons['development'] = array('accountfilter','address','addtags','ads-bilboard','aef','ajax','algorhythm','apache-feather','authentication-keyalt','autorespond','awstats','backupwizard','bbpress','bigace','binary','boxbilling','boxtrapper-mousetrap','braces','branch','btwoevolution','bug','calendaralt-cronjobs','certificate','certificatealt','certificatethree','cgi','cgicenter','chevrons','chyrp','circledownload','circlegithub','circleupload','cloud','cloudalt','cloudaltdownload','cloudaltprivate','cloudaltsync','cloudaltupload','clouddownload','clouderror','cloudsync','cloudupload','cmsmadesimple','code','codeigniter','collabtive','commentout','commit','compile','concretefive','contao','coppermine','cpanel','cplusplus','csharp','cssthree','debug','diskspace','dnszone','dolphinsoftware','domainaddon','dotclear','dotproject','dropmenu','drupal','elgg','emailforwarders','emailtrace','eoneohseven','erroralt','etano','eventum','exclamation-sign','extjs','eyeos','fantastico','faq','fengoffice','filter','fluxbb','forkcms','form','fourimages','fourohfour','ftpaccounts','ftpsession','fuelphp','github','grails','history','hotlinkprotection','html','htmlfile','htmlfive','images-gallery','importcontacts','impresscms','impresspages','indexmanager','ipcontrol','issue','issueclosed','issuereopened','java','jcore','jcow','joomla','jquery','jqueryui','key','kimai','kohana','language','leechprotect','legacyfilemanager','limesurvey','lock','magento','mahara','mailbox','mailinglists','mambo','mantisbugtracker','mergethree','mibew','mimetype','minibb','modx','modxalt','mongodb','monstra','mootools','mootoolsthree','mootoolstwo','mxentry','mybb','mysql-dolphin','mysqlthree','neofourj','nodejs','nosql','nucleus','opencart','openclassifieds','opensource','openx','orangehrm','osclass','oscommerce','oxwall','pagecookery','parentheses','parkeddomain','password','passwordalt','perl-camel','perlalt','pgsql','phorum','php','phpbb','phpbbalt','phplist','phpmyfaq','phpnuke','phppear','pill-antivirusalt','pimcore','pivotx','piwigo','pixie','playvideo','pligg','plogger','pluginalt','pommo','prestashop','projectcompare','projectfork','projectforkdelete','projectforkprivate','projectmerge','projectpier','projectsend','protecteddirectory','pull','pullalt','pullrequest','punbb','push','pushalt','puzzle-plugin','pyrocms','python','query','raphael','rawaccesslogs','redaxscript','redirect','refresh','removetags','restricted','roundcube','ruby','rubyalt','satellitedish-remotemysql','saurus','savetodrive','script','scriptalt','security-shield','securityalt-shieldalt','sharetronix','shortcut','sidu','silverstripe','simplepie','sizzle','smarty','smf','snews','software','spam','spamalt','splitthree','squarebrackets','squaregithub','ssh','sslmanager','subdomain','subrion','symphony','sync','syringe-antivirus','tag','tags','tampermonkey','taskfreak','taskmanager-logprograms','tasks','theme-style','tikiwiki','tomatocart','tools','traq','typothree','unlock','userfilter','vanillacms','versions','virus','visitor','vtiger','webinsta','webmail','webplatform','whmcs','wizard','wordpress','wrench','xoops','yiiframework','yui','zencart','zendframework','zenphoto','zikula','zurmo');

$ps_icons['entertainment'] = array('avengers','batman','captainamerica','charliechaplin','darthvader','deathstar','deathstarbulding','drmanhattan','drwho','greenlantern','harrypotter','ironman','jason','marvin','mickeymouse','monstersinc','punisher','robocop','rorschach','spawn','spider','spiderman','spock','superman','tron','vendetta','walle','xmen');

$ps_icons['food'] = array('avocado','bacon','banana','beer','beeralt','bread','candy','candycane','carrot','chef','cherry','cherryalt','chicken','chickenalt','chocolate','cocktail','coffee','coffeebean','coffeecupalt','cow','crackedegg','croisant','cup-coffeealt','cupcake','donut','egg','eggplant','fish','foodtray','fries','glass','grapes','hamburger','honeycomb','hotdog','icecream','icecreamalt','icecreamthree','kiwifruit','lemon','lollypop','muffin','mushroom','onion','orange','pasta','pear','pepperoni','pizza','popcorn','pretzel','raspberry','restaurantmenu','sheep','sodacup','soup','steak','strawberry','sunnysideup','taco','tallglass','tea','teapot','toast','turnip','watermelon','wine','wineglass');

$ps_icons['hosting'] = array('affiliate','amd','analytics-piechart','analyticsalt-piechartalt','backup-vault','backupalt-vaultalt','bandwidth','barchart','brokenlink','cloudhosting','cms','colocation','colocationalt','controlpanel','controlpanelalt','cooling','cpu-processor','cpualt-processoralt','database','databaseadd','databasedelete','dedicatedserver','domain','firewall','ftp','hdd','home','homealt','intel','lifepreserver','link','linux','managedhosting','ram','reliability','resellerhosting','seo','server','servers','sharedhosting','socialnetwork','storage-box','storagealt-drawer','support','supportalt','uptime','vps','webhostinghub','webpage','websitealt','websitebuilder','windows');

$ps_icons['menu'] = array('addtolist','arrow-down','arrow-left','arrow-right','arrow-up','asterisk','asteriskalt','backward','ban-circle','bigger','capslock','check','checkboxalt','chevron-down','chevron-left','chevron-right','chevron-up','circle-arrow-down','circle-arrow-left','circle-arrow-right','circle-arrow-up','circledown','circleleft','circleloaderempty','circleloaderfive','circleloaderfour','circleloaderfull','circleloaderone','circleloaderseven','circleloadersix','circleloaderthree','circleloadertwo','circleright','circleup','clipboardalt','cog','divide','downleft','downright','edit','enter','enteralt','equals','exit','exitalt','export','exportfile','eye-close','eye-open','fast-backward','fast-forward','fastdown','fastleft','fastright','fastup','fatarrowdown','fatarrowleft','fatarrowright','fatarrowup','fatredo','fatundo','flowdown','flowup','forbidden','forbiddenalt','forward','fullscreen','gearfour','horizontalcontract','horizontalexpand','import','importfile','info-sign','infographic','keyboarddelete','knob','lightbulb-idea','linkalt','list-alt','loadingalt','loadingeight','loadingfive','loadingflowccw','loadingflowcw','loadingfour','loadingone','loadingseven','loadingsix','loadingthree','loadingtwo','markerdown','markerleft','markerright','markerup','maximize','merge','mergecells','minimize','minus-sign','minus','move','octoloaderempty','octoloaderfive','octoloaderfour','octoloaderfull','octoloaderone','octoloaderseven','octoloadersix','octoloaderthree','octoloadertwo','ok-circle','ok-sign','ok','opennewwindow','pageback','pageforward','pagesetup','pastealt','percent','plus-sign','plus','preview','question-sign','quotedown','quoteup','radiobutton','refreshalt','remove-circle','remove-sign','remove','repeat','resize-full','resize-horizontal','resize-small','resize-vertical','resizehorizontalalt','resizeverticalalt','restore','settingsandroid','settingsfour-gearsalt','settingsthree-gears','settingstwo-gearalt','sharetwo','slideronefull','slidersasc','slidersdesc','slidersfull','slidersmiddle','slidersoff','sliderthreefull','slidertwofull','smaller','split','squaresearch','squaresettings','squarevoice','stacks','sum','switchoff','switchon','synckeeplocal','synckeepserver','undo','upleft','upright','warning-sign','wizardhat','zoom-in','zoom-out');

$ps_icons['misc'] = array('acorn','alertalt','alienship','arch','baby','bait','baloon','bamboo','bathtub','beaker','beakeralt','bed','bell','bellalt','belt','binoculars-searchalt','biohazard','birdhouse','bone','bottle','bowl','bowtie','brain','brokenheart','broom','bullet','bullhorn','butterfly','butterflyalt','campfire','candle','cannon','carbattery','cat','catface','cctv','ceilinglight','cell','chair','chandelier','christiancross','cigar','circlefork','circlehammer','circleknife','circlepencil','circlescrewdriver','circlespoon','clover','cloveralt','construction','crown','cuthere','danger','davidstar','diamond','director','dna','dog','doghouse','drill','ducky','extinguisher','eye-view','fan','fedora','fence','fire','fireplace','firstaid','fishbone','flashlight','flashlightalt','flaskfull','flower','flowernew','flowerpot','forklift','fridge','gender','glasses','glassesalt','glue','grave','gravefour','gravethree','gravetwo','greenlightbulb','gun','hammer','hammeralt','handcuffs','hanger','heartarrow','heartsparkle','infinity','infinityalt','islam','jar','jersey','kidney','kiss','kiwi','koala','lab-flask','lamp','lampalt','leaf','leather','lego','lightningalt','lightoff','lighton','lips','lipstick','liver','lungs','magnet','man-male','manalt','manillaenvelope','manualshift','microscope','microwave','milk','mirror','molecule','moustache','mug','mushroomcloud','nail','nut','origami','pacifier','panda','panties','paperboat','paperclip','paperclipalt','paperclipvertical','papercutter','paperplane','patch','paw-pet','peace','perfume','pickaxe','pictureframe','pipe','planet','plantalt','plaque','police','poop','poopalt','powerplugeu','powerplugus','rabbit','radioactive','razor','recycle','ring','rocket-launch','root','safetygoggles','safetypin','satellite','scales','science-atom','scissorsalt','screw','screwdriver','screwdriveralt','shades-sunglasses','shell','sheriff','shirtbutton','shirtbuttonalt','shirtbuttonthree','shovel','skull','sleep','snowman','solarsystem','spiderweb','splitalt','stiletto','stomach','stove','stroller','student-school','submarine','switch','switchoffalt','switchonalt','tank','target','teddybear','telescope','tint','toiletpaper','tooth','toothbrush','tophat','torch','torigate','treeornament','tshirt','vial','viking','voltage','washer','weight','weightscale','wetfloor','whistle','woman-female','womanalt','wrenchalt','wwf','yinyang');

$ps_icons['multimedia'] = array('album-cover','autoflash','bookthree','boombox','burstmode','camcorder','camera','cameraflash','cassette','cassettealt','circlebackward','circlebackwardempty','circleforward','circleforwardempty','circlenext','circlenextempty','circlepause','circlepauseempty','circleplay','circleplayempty','circleprevious','circlepreviousempty','circlerecord','circlerecordempty','circlestop','circlestopempty','comedy','earbuds','earbudsalt','eject','equalizer','equalizeralt','equalizerthree','facetime-video','film','filmstrip','fx','gramophone','guitar','hdtv','hdvideo','headphones','headphonesalt','headphonesthree','indentleft','indentright','ipod','mediarepeat','metronome','microphone','microphonealt','microphonethree','movieclapper','moviereel','moviereelalt','music','musicalt','musicsheet','musicthree','mutemic','next','noflash','panorama','panoramaalt','pause','photosphere','play-circle','play','podcast','polaroid','previous','radio','random','record','remote','repeatone','sdvideo','sixteentonine','soundcloud','soundleft','soundright','soundwave','speaker','speakeralt','squareback','squareforward','squarenext','squarepause','squareplay','squareprevious','squarerecord','squarestop','step-backward','step-forward','stop','subtitles','subtitlesoff','theather','threetofour','tragedy','trumpet','tunein','tuneinalt','tv','video','videocamerathree','violin','vlc-cone','voice');

$ps_icons['sport-games'] = array('analogdown','analogleft','analogright','analogup','angrybirds','aperture','atari','axe','basketball','bat','bishop','boardgame','bomb','bow','bowling','bowlingpins','boxing','buttona','buttonb','buttonx','buttony','clubs','controllernes','controllerps','controllersnes','creeper','cricket','curling','dagger','dart','diamonds','die-dice','diefive','diefour','dieone','diesix','diethree','dietwo','domino','dominoeight','dominofive','dominofour','dominonine','dominoone','dominoseven','dominosix','dominothree','dominotwo','eightball','football-soccer','gameboy','gamecursor','ghost','golf','halflife','halo','hearts','hockey','ingress','joystickarcade','joystickatari','king','knight','lifeempty','lifefull','lifehalf','medal','medalbronze','medalgold','medalsilver','minecraft','minecraftalt','nintendods','oneup','oneupalt','pacman','pawn','pixelarrow','pixelaxe','pixelbastardsword','pixelbattleaxe','pixelbow','pixelbroadsword','pixelchest','pixeldagger','pixelelixir','pixelheart','pixellance','pixelpickaxe','pixelpotion','pixelpotionalt','pixelshield','pixelshovel','pixelsphere','pixelsword','pixelwand','playstation','podium-winner','pokemon','pscircle','pscursor','psdown','psleft','pslone','psltwo','psright','psrone','psrtwo','pssquare','pstriangle','psup','psx','quake','queen','raceflag','racquet','residentevil','rook','spaceinvaders','spades','stadium','starempty','starfull','starhalf','steam','steamalt','sword','tabletennis-pingpong','tennis','tetrisone','tetristhree','tetristwo','tictactoe','trophy','usfootball','warcraft','warmedal','warmedalalt','xbox','zelda');

$ps_icons['symbols'] = array('braille0','braille1','braille2','braille3','braille4','braille5','braille6','braille7','braille8','braille9','braillea','brailleb','braillec','brailled','braillee','braillef','brailleg','brailleh','braillei','braillej','braillek','braillel','braillem','braillen','brailleo','braillep','brailleq','brailler','brailles','braillespace','braillet','brailleu','braillev','braillew','braillex','brailley','braillez','circlea','circleb','circlec','circled','circlee','circleeight','circlef','circlefive','circlefour','circleg','circleh','circlei','circlej','circlek','circlel','circlem','circlen','circlenine','circleo','circleone','circlep','circleq','circler','circles','circleseven','circlesix','circlet','circlethree','circletwo','circleu','circlev','circlew','circlex','circley','circlez','circlezero','pigpena','pigpenb','pigpenc','pigpend','pigpene','pigpenf','pigpeng','pigpenh','pigpeni','pigpenj','pigpenk','pigpenl','pigpenm','pigpenn','pigpeno','pigpenp','pigpenq','pigpenr','pigpens','pigpent','pigpenu','pigpenv','pigpenw','pigpenx','pigpeny','pigpenz','square0','square1','square2','square3','square4','square5','square6','square7','square8','square9','squarea','squareb','squarec','squared','squaree','squaref','squareg','squareh','squarei','squarej','squarek','squarel','squarem','squaren','squareo','squarep','squareq','squarer','squares','squaret','squareu','squarev','squarew','squarex','squarey','squarez','zodiac-aquarius','zodiac-aries','zodiac-cancer','zodiac-capricorn','zodiac-gemini','zodiac-leo','zodiac-libra','zodiac-pisces','zodiac-sagitarius','zodiac-scorpio','zodiac-taurus','zodiac-virgo');

$ps_icons['time-location'] = array('addalarm','alarm','alarmalt','alarmclock','anchor-port','asteroid','astronaut','automobile-car','bag','boat','bus','busalt','cactus-desert','calendar','checkin','checkinalt','christmastree','church','cigarette','city','clockalt-timealt','compass','constellation','counter','counteralt','cuckooclock','deletealarm','directions','donotdisturb','egyptpyramid','elevator','emergency','escalator','fallingstar','flag','flagalt','flagtriangle','forest-tree','forestalt-treealt','fork','fort','fountain','freeway','galaxy','galaxyalt','garage','gasstation','globe','globealt','gpsalt','gpsoff-gps','gpson','greekcolumn','helicopter','hospital','house','hydrant','intersection','island','knife','lighthouse','lightning','map-marker','map','mayanpyramid','men','meteor','meteorite','metro-subway','moon-night','moonfirstquarter','moonfull','moonnew','moonorbit','moonthirdquarter','moonwaningcrescent','moonwaninggibbous','moonwaxingcrescent','moonwaxinggibbous','mosque','mountains','navigation','notesdate','notesdatealt','noteslist','noteslistalt','noteslocation','noteslocationalt','notestasks','notestasksalt','observatory','office-building','panoramio','parkingmeter','parthenon','pin','placeadd','placealt','placealtadd','placealtdelete','placedelete','placeios','plane','planealt','radar','railroad','railtunnel','rain','rim','road','roadsign-roadsignright','roadsignleft','roadtunnel','route','rudder','scope-scan','scopealt','sextant','shipping','shuttle','snooze','snow','speed','speedalt','spoon','sputnik','stairsdown','stairsup','stamp','stampalt','stopwatch','storm','sun-day','sunrise','sunset','taxi','temperature-thermometer','temperaturealt-thermometeralt','temple','tent-camping','tidefall','tiderise','time','timer','tornado','trafficlight','trailor','train','travel','treethree','truck','turnleft','turnoffalarm','turnright','umbrella','watch','watertap-plumbing','wave-sea','wavealt-seaalt','wheel','wheelchair','wind','windleft','windright','women','world');

if(!function_exists('ps_generate_icons')) {
	function ps_generate_icons() {
	$output = '';
	global $ps_icons;
	foreach( $ps_icons as $key => $option )
				{
		$output .= '<div class="' . $key . ' ps-container-icons"><ul class="ps-list-icons">';
		foreach( $option as $ps_icon ) {
								
								if($key == 'small-icons') {
										
										$output .='<li><a href="#" title="smico-'.$ps_icon.'"><i class="smico-'.$ps_icon.'"></i></a></li>';
									} 
								
								elseif ($key == 'social-media') {
									
									$output .='<li><a href="#" title="social-'.$ps_icon.'"><i class="social-'.$ps_icon.'"></i></a></li>';	
									
									}
								elseif ($key == 'flat-icons') {
									
									$output .='<li><a href="#" title="flatico-'.$ps_icon.'"><i class="flatico-'.$ps_icon.'"></i></a></li>';	
									
									}	
								else {
									$output .='<li><a href="#" title="icon-'.$ps_icon.'"><i class="icon-'.$ps_icon.'"></i></a></li>';	
									}	
								}
					$output .= '</ul></div>' . "\n";
										
				}

		return $output;
	}
	
}

if (!function_exists('printIconSelect')){
	
	function printIconSelect($name, $specific = null, $preview = true, $selected_opts = '') {
	global $ps_icons;
	
	$output = '<select name="'.$name.'" id="'.$name.'" class="width120">';
	$output .= '<option value="">'.__('Select an icon','prodigystudio').'</option>';    
	
if($specific == null ) {
	foreach( $ps_icons as $key => $option ) {
		if($key != 'small-icons'){$output .= '<optgroup label="' . $key . '">';}
			foreach( $option as $ps_icon ) {
			
				if ($key == 'social-media') {
					$output .='<option value="social-'.$ps_icon.'">social-'.$ps_icon.'</option>';	
				}
				elseif ($key == 'flat-icons') {
					$output .='<option value="flatico-'.$ps_icon.'">flatico-'.$ps_icon.'</option>';	
				}
				else {
				$output .='<option value="icon-'.$ps_icon.'">icon-'.$ps_icon.'</option>';	
				}	
			}
			if($key != 'small-icons'){$output .= '</optgroup>' . "\n";}
	}
} else {
	foreach( $ps_icons[$specific] as $option ) {		
				$selected_html = '';				 									
				if ($specific == 'social-media') {
					if($selected_opts == 'social-'.$option) {$selected_html = 'selected="selected"';}
					$output .='<option '.$selected_html.' value="social-'.$option.'">'.$option.'</option>';	
				}
				else {
					$output .='<option value="icon-'.$option.'">icon-'.$option.'</option>';	
				}	
						
	}
}

	$output .= '</select>';	
	
	if($preview != false) {
		$output .= '<span class="previewicon"><i class="myclass"></i></span>';	
	}

    return $output;
	}
	
}
if (class_exists('WPBakeryVisualComposerAbstract') && is_admin()) {
add_action('init', 'printIconSelect',1);
}

// Add Icons admin CSS styles
function load_vc_icons_admin_style() {
	wp_enqueue_style( 'social-icons', get_template_directory_uri() . '/framework/vc_extend/icons/assets/css/social-icon.css', false, '1.0', 'all' );
	wp_enqueue_style( 'whhg', get_template_directory_uri() . '/framework/vc_extend/icons/assets/css/whhg.css', false, '1.0', 'all' );
	wp_enqueue_style( 'flat-icons', get_template_directory_uri() . '/framework/vc_extend/icons/assets/css/flat-icon.css', false, '1.0', 'all' );	
     
}
add_action( 'admin_enqueue_scripts', 'load_vc_icons_admin_style' );

?>