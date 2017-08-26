<?php

$MAIL_CONFIG = array (
		'contact_email' => 'contact@matchmytalent.com',
		'youtube_email' => 'yt@matchmytalent.com',
		'contact_email_name' => 'match[my]talent',
		'contact_email_password' => 'Axiom@2014_))&',
		'mandrillapp_SMTP_password' => 'FRhIw_rB9NSbq9_bKkwacQ',
		'SMTPSecure' => 'ssl',
		'host_g' => 'smtp.gmail.com',//required for gmail
		'host_m' => 'smtp.mandrillapp.com',//required for mandrillapp
		'port' => '465', // for SMTPSecure=ssl connection use port 465 otherwise you can use port 587 or 25
		'support_email' => 'dhara@matchmytalent.com',
		'support_email_name' => 'Dhara Shah',
);

$task_template = array(

	'task_added' => array(
						'subject' => 'New Task Added',
						'message' => 'Hello, <br><br> 
									%%CREATOR%% has created the following task under MMT project: <br><br> 
									<b>Task Title:</b> %%TASK_TITLE%% <br>
									<b>Task Description:</b> %%TASK_DESC%% <br>
									<b>Task Assignee:</b> %%ASSIGNEE%% <br>
									<b>Priority:</b> %%PRIORITY%% <br>
									<b>Due Date:</b> %%DUE_DATE%% <br><br>
									Thanks'
					),
	'task_modified' => array(
						'subject' => 'Task Updated',
						'message' => 'Hello, <br><br> 
									%%USER%% has modified the following task under MMT project: <br><br> 
									<b>Task Title:</b> %%TASK_TITLE%% <br>
									<b>Task Description:</b> %%TASK_DESC%% <br>
									<b>Task Assignee:</b> %%ASSIGNEE%% <br>
									<b>Priority:</b> %%PRIORITY%% <br>
									<b>Due Date:</b> %%DUE_DATE%% <br><br>
									Thanks'
					),
	'task_lapsed' => array(
						'subject' => 'Task Lapsed',
						'message' => 'Hello, <br><br> 
									Task which is assigned to %%ASSIGNEE%% has been lapsed: <br><br> 
									<b>Task Creator:</b> %%CREATOR%% <br>
									<b>Task Title:</b> %%TASK_TITLE%% <br>
									<b>Task Description:</b> %%TASK_DESC%% <br>
									<b>Priority:</b> %%PRIORITY%% <br>
									<b>Due Date:</b> %%DUE_DATE%% <br><br>
									Thanks'
					),
	'task_deleted' => array(
						'subject' => 'Task Deleted',
						'message' => 'Hello, <br><br> 
									%%DELETER%% has deleted the following task from MMT project: <br><br> 
									<b>Task Title:</b> %%TASK_TITLE%% <br>
									<b>Task Description:</b> %%TASK_DESC%% <br>
									<b>Task Assignee:</b> %%ASSIGNEE%% <br>
									<b>Priority:</b> %%PRIORITY%% <br>
									<b>Due Date:</b> %%DUE_DATE%% <br><br>
									Thanks'
					),
	'task_moved' => array(
						'subject' => 'Task Moved',
						'message' => 'Hello, <br><br> 
									%%USER%% has moved a task <b>%%TASK_TITLE%%</b> %%NEW_STATUS%% assigned to %%ASSIGNEE%%: <br><br>
									<b>Task Creator:</b> %%CREATOR%% <br>
									<b>Task Title:</b> %%TASK_TITLE%% <br>
									<b>Task Description:</b> %%TASK_DESC%% <br>
									<b>Priority:</b> %%PRIORITY%% <br>
									<b>Due Date:</b> %%DUE_DATE%% <br><br>
									Thanks'
					),
	'task_completed' => array(
						'subject' => 'Task Completed',
						'message' => 'Hello, <br><br> 
									%%ASSIGNEE%% has completed the following task: <br><br> 
									<b>Task Creator:</b> %%CREATOR%% <br>
									<b>Task Title:</b> %%TASK_TITLE%% <br>
									<b>Task Description:</b> %%TASK_DESC%% <br>
									<b>Priority:</b> %%PRIORITY%% <br>
									<b>Due Date:</b> %%DUE_DATE%% <br><br>
									Thanks'
					)
);

function SendEmail_MMT($MAIL_CONFIG, $html, $To_email, $subject, $altBody, $To_name, $support=0, $addCC=0, $From_email='', $From_name=''){
		//require_once('class.phpmailer.php');

		
		
		//include_once("Email/class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
		
		$mail             = new PHPMailer();
		$body             = "$html";
		
		$mail->IsSMTP(); 						   // telling the class to use SMTP
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = $MAIL_CONFIG['SMTPSecure'];
		$mail->Host       = $MAIL_CONFIG['host'];// sets the SMTP server
		$mail->Port       = $MAIL_CONFIG['port'];                   // set the SMTP port for the GMAIL server
		$mail->Username   = $MAIL_CONFIG['contact_email']; // SMTP account username
		$mail->Password   = $MAIL_CONFIG['mandrillapp_SMTP_password']; // $MAIL_CONFIG['contact_email_password']; // SMTP account password
		
		if($support == 1){
			$mail->SetFrom($MAIL_CONFIG['support_email'], $MAIL_CONFIG['support_email_name']);
			$mail->AddReplyTo($MAIL_CONFIG['support_email'], $MAIL_CONFIG['support_email_name']);
		}
		elseif($From_email != ''){
			$mail->SetFrom($From_email, $From_name);
			$mail->AddReplyTo($From_email, $From_name);
		}
		else{
			$mail->SetFrom($MAIL_CONFIG['contact_email'], $MAIL_CONFIG['contact_email_name']);
			$mail->AddReplyTo($MAIL_CONFIG['contact_email'], $MAIL_CONFIG['contact_email_name']);
		}
		
		$mail->Subject    = $subject;
		$mail->AltBody    = $altBody; // optional, comment out and test
		$mail->MsgHTML($body);
		
		$mail->AddAddress(trim($To_email), trim($To_name));
		
		if($addCC == 1)
			$mail->AddCC($MAIL_CONFIG['support_email'], $MAIL_CONFIG['support_email_name']); // dhara@matchmytalent.com
		//echo "<pre>";print_r($mail);echo "</pre>";exit;
		//$mail->Send();
		if($mail->Send()){
			unset($mail);
			return '1';
		}else{
			unset($mail);
			return '0';
		}
	}

$USER_STATUS = array('0'=>'Pending','1'=>'Done');
$CALL_VARIFIED = array('0'=>'Call Pending', '1'=>'Verified','2'=>'Call Back', '3'=>'Bogus Profile');
$EXPERIENCE= array(
	 	"1" =>"Fresher"
		,"2" =>"Experienced"
);

//=== MANDATORY ATTRIBUTES FIELDS ARRAY  created by sunil on 06-02-2015 ====//
$MANDATORY_ATTRIBUTES = array(
			'1' => array(						// actor
						'primary_language',
						'height_feet',
						'skin_color',
						'physique',
						'hair_length',
						'hair_type',
						'voice',
						'waist_size',
						'chest_size',		
				  ),
			'2' => array(
						'preferred_dancing_style'
						),						// dancer
			'3' => array( 					  	// voice artist	
						'primary_language',
						'type_of_voice'
						),
			'4' => array( 					  	// singer	
						'primary_language',
						'voice'
						),					
			'5' => array( 					  	// Event artist
						'26' => array(			// anchor MC
									  'primary_language',
									  'voice',																						
									),
						'27' => array(			// RJ's profile
									  'primary_language',
									  'voice',
									  'rjing_style'											
									),		
						'30' => array(			// Magician's profile
									  'primary_language',
									  'voice',
									  'rjing_style'											
									)																						
						),
			'6' => array(						// Model
						'height_feet',
						'skin_color',
						'physique',
						'hair_length',
						'hair_type',
						'voice',
						'waist_size',
						'chest_size',
						),							
			'7' => array( 					  	// stunt artist							
						),
			'8' => array( 					  	// Musician
						'0' => array(			// all other
									  'best_at_playing',
									  'prefer_playing_music'
									 ),
						'60' => array(			// Band
									  'best_at_playing',									  			
									 )
						)
			
		);

$CALL_TYPE = array('1'=>'Invitation Call', '2'=>'Verification Call', '3'=>'Email Activation Call', '4'=>'Profile Completion Call', '5'=>'Show-Reel Media Call', '6'=>'C2R - Call to Registration', '7'=>'User Query Call');

$DISPOSITION_WITH_TYPE = array(
							1 => array(
									'INV_DONE',
									'INV_RMDR',
									'INV_NR',
									'INV_PNA',
									'INV_N',
									'INV_SO',
									'INV_CALLBK',
									'INV_A',
									'INV_DUP',
									'INV_DC',
									'INV_DNC',
									'INV_NI',
									'INV_WRN',
									'INV_OS',
									'INVRG',
									'INV_LANBR',
							),
							
							2 => array(
									'VER_DONE',
									'VER_RMDR',
									'VER_NR',
									'VER_PNA',
									'VER_N',
									'VER_SO',
									'VER_CALLBK',
									'VER_A',
									'VER_DUP',
									'VER_DC',
									'VER_DNC',
									'VER_NI',
									'VER_WRN',
									'VER_OS',
									'VER_LANBR',
							),
							
							3 => array(
									'EA_DONE',
									'EA_RMDR',
									'EA_NR',
									'EA_PNA',
									'EA_N',
									'EA_SO',
									'EA_CALLBK',
									'EA_A',
									'EA_DUP',
									'EA_DC',
									'EA_DNC',
									'EA_NI',
									'EA_WRN',
									'EA_OS',
									'EA_LANBR',
							),
							
							4 => array(
									'PRO_DONE',
									'PRO_RMDR',
									'PRO_NR',
									'PRO_PNA',
									'PRO_N',
									'PRO_SO',
									'PRO_CALLBK',
									'PRO_A',
									'PRO_DUP',
									'PRO_DC',
									'PRO_DNC',
									'PRO_NI',
									'PRO_WRN',
									'PRO_OS',
									'PRO_LANBR',
							),
							
							5 => array(
									'SR_DONE',
									'SR_RMDR',
									'SR_NR',
									'SR_PNA',
									'SR_N',
									'SR_SO',
									'SR_CALLBK',
									'SR_A',
									'SR_DUP',
									'SR_DC',
									'SR_DNC',
									'SR_NI',
									'SR_WRN',
									'SR_OS',
									'SR_LANBR',
							),
							
							6 => array(
									'C2R_DONE',
									'C2R_RMDR',
									'C2R_NR',
									'C2R_PNA',
									'C2R_N',
									'C2R_SO',
									'C2R_CALLBK',
									'C2R_A',
									'C2R_DUP',
									'C2R_DC',
									'C2R_DNC',
									'C2R_NI',
									'C2R_WRN',
									'C2R_OS',
									'C2R_LANBR',
							),
							
							7 => array(
									'USRQ_DONE',
									'USRQ_RMDR',
									'USRQ_NR',
									'USRQ_PNA',
									'USRQ_N',
									'USRQ_SO',
									'USRQ_CALLBK',
									'USRQ_A',
									'USRQ_DUP',
									'USRQ_DC',
									'USRQ_DNC',
									'USRQ_NI',
									'USRQ_WRN',
									'USRQ_OS',
									'USRQ_LANBR',
							),
			   );

$USER_TYPE = array('2'=>'Producer');

$PROFILE_STATUS= array( "2" =>"Deactivated" );

$PROFILE_COMPLETION = array('1'=>'1st Step Completed', '2'=>'2nd Step Completed');

$GENDER= array(
	 	"1" =>"Male"
		,"2" =>"Female"
		,"3" =>"Other"
);
$TALENT= array(
		'' => '--Select--'
		,"1" =>"Actor"
		,"2" =>"Dancer"
		,"4" =>"Event Artists"
		,"5" =>"Model"
		,"9"=>"Musician"
		,"6" =>"Singer"
		,"7" =>"Stunts Artist"
		,"8" =>"Voice Artist"
);

$TALENT_FILES = array(
		"1" =>"actor.php"
		,"2" =>"dancer.php"
		,"4" =>"event_artist.php"		
		,"5" =>"model.php"
		,"6" =>"singer.php"
		,"7" =>"stunt_artist.php"
		,"8" =>"voice_artist.php"
		,"9"=>"musician.php"
);

$SPECIALIZATION = array(
						'1' => array(
								'1'=>"Character Actor",
								'2'=>"Child Actor",
								'6'=>"Comic Actor",
								'9'=>"Cross gender Actor",
								'10'=>"Specific Actors",
								'5'=>"Stunt Actor",
								'7'=>"Supporting Actor",
								'3'=>"Theatre Actor",
								'4'=>"TV Actor",
								'8'=>"TV Anchor",				
								'11'=>"Other Actors",								
								'51'=>"Thriller Role",
								'52'=>"Romantic Role",
								'53'=>"Mythological Actor",
								'54' => 'Lead Role',
								),
						'2' => array(
								'15'=>"Bollywood",
								'12'=>"Classical",
								'13'=>"Contemporary",
								'14'=>"Folk",
								),
						'8' => array(
								'17'=>"Character",
								//'19'=>"Foreign language",
								//'20'=>"Indian regional language",
								'18'=>"Mimic",
								'16'=>"Narrative",
								),
						'4' => array(
								'21'=>"Anchor/MC",
								'22'=>"DJ",
								'25'=>"Magician",
								'18'=>"Mimic",
								'56' =>'Puppeteer',
								'23'=>"RJ",
								'26'=>"Standup Comedian",
								'24'=>"VJ",
								),
						'5' => array(
								'31'=>"Alternative model",
								'36'=>"Art model",
								'34'=>"Commercial print and on-camera model",
								'33'=>"Fitness model",
								'30'=>"Glamour model",
								'32'=>"Parts model",
								'29'=>"Plus-size model",
								'35'=>"Promotional model",
								'28'=>"Runway model",
								),
						'6' => array(
								'38'=>"Contemporary Singer",
								'37'=>"Classical Singer",
								'40'=>"Folk Singer",
								'55' => 'Fusion Singer',
								'39'=>"Jazz Singer",
								'70'=>'RAP',
								'73'=>'Devotional',
								'74'=>'Beatboxing',
								),
						'7' => array(
								'41'=>"Acrobats",
								'42'=>"Aerialist",
								'45'=>"Fire performances",
								'46'=>"Human pyramid",								
								'43'=>"Juggler",
								'47'=>"Knife throwing",								
								'44'=>"Stilts",
								'48'=>"Tight rope walking",
								'49'=>"Trapeze",
								'50'=>"Wheel gymnastics",
								'75'=>"Stunt rider",
								'76'=>"Skateboard",
								'77'=>"Crew",
								),
						'9' => array(
								'57'=>"Band",
								'58'=>"Brass Instrumentalist",
								'59'=>"Clarinet Instrumentalist",
								'60'=>"Classical Percussionist",
								'61'=>"Drummer",
								'62'=>"Electronic Instrumentalist",
								'63'=>"Flute Player",
								'64'=>"Guitarist",
								'65'=>"Pianist",
								'66'=>"String Instrumentalist",
								'67'=>"Wind  Instrument Player",
								'68'=>"Western Instrumentalist",
								'69'=>"Xylophone Player",
								'71'=>'Octapad',
								'72'=>'Harmonium',
								'78'=>'Duo',
								),
								
			);
			
$SPECIALIZATION_SD = array(
					'1'=>"Character Actor",
					'2'=>"Child Actor",
					'6'=>"Comic Actor",
					'9'=>"Cross gender Actor",
					'10'=>"Specific Actors",
					'5'=>"Stunt Actor",
					'7'=>"Supporting Actor",
					'3'=>"Theatre Actor",
					'4'=>"TV Actor",
					'8'=>"TV Anchor",				
					'11'=>"Other Actors",								
					'51'=>"Thriller Role",
					'52'=>"Romantic Role",
					'53'=>"Mythological Actor",
					'54' => 'Lead Role',
					'15'=>"Bollywood",
					'12'=>"Classical",
					'13'=>"Contemporary",
					'14'=>"Folk",
					'17'=>"Character",
					//'19'=>"Foreign language",
					//'20'=>"Indian regional language",
					'18'=>"Mimic",
					'16'=>"Narrative",
					'21'=>"Anchor/MC",
					'22'=>"DJ",
					'25'=>"Magician",
					'18'=>"Mimic",
					'23'=>"RJ",
					'26'=>"Standup Comedian",
					'24'=>"VJ",
					'31'=>"Alternative model",
					'36'=>"Art model",
					'34'=>"Commercial print and on-camera model",
					'33'=>"Fitness model",
					'30'=>"Glamour model",
					'32'=>"Parts model",
					'29'=>"Plus-size model",
					'35'=>"Promotional model",
					'28'=>"Runway model",
					'38'=>"Contemporary Singer",
					'37'=>"Classical Singer",
					'40'=>"Folk Singer",
					'39'=>"Jazz Singer",
					'41'=>"Acrobats",
					'42'=>"Aerialist",
					'45'=>"Fire performances",
					'46'=>"Human pyramid",								
					'43'=>"Juggler",
					'47'=>"Knife throwing",								
					'44'=>"Stilts",
					'48'=>"Tight rope walking",
					'49'=>"Trapeze",
					'50'=>"Wheel gymnastics",
					
					'55' => 'Fusion Singer',
					'56' => 'Puppeteer',
					
					'57'=>"Band",
					'58'=>"Brass Instrumentalist",
					'59'=>"Clarinet Instrumentalist",
					'60'=>"Classical Percussionist",
					'61'=>"Drummer",
					'62'=>"Electronic Instrumentalist",
					'63'=>"Flute Player",
					'64'=>"Guitarist",
					'65'=>"Pianist",
					'66'=>"String Instrumentalist",
					'67'=>"Wind  Instrument Player",
					'68'=>"Western Instrumentalist",
					'69'=>"Xylophone Player",
					'70'=>'RAP',
					'71'=>'Octapad',
					'72'=>'Harmonium',
					'73'=>'Devotional',
					'74'=>'Beatboxing',
					'75'=>"Stunt rider",
					'76'=>"Skateboard",
					'77'=>"Crew",
					'78'=>'Duo',
			);			

if(isset($_REQUEST['talent']))
{
	$sp = $SPECIALIZATION[$_REQUEST['talent']];
	//print_r($sp);
	if($sp >= 1){
	echo '<select id="specs'.(($_REQUEST['id'] != '') ? $_REQUEST['id'] : '' ).'" class="h_select" onchange="changeSupSpecs('.(($_REQUEST['id'] != '') ? $_REQUEST['id'] : '' ).');" tabindex="43" name="specialization'.(($_REQUEST['id'] != '') ? $_REQUEST['id'] : '' ).'" >';
		echo "<option value=''>--Select--</option>";
	foreach($sp as $ksp=>$vsp){
		echo "<option value='$ksp'>$vsp</option>";
	}
	echo '</select>';
	}else{echo 'null';}
}

if(isset($_REQUEST['add_talent']))
{
	$sp = $SPECIALIZATION[$_REQUEST['add_talent']];
	//print_r($sp);
	if($sp >= 1){
	echo '<select id="specs_add" class="h_select" onchange="changeSupSpecs_add('.(($_REQUEST['id'] != '') ? $_REQUEST['id'] : '' ).');" tabindex="44" name="specialization_add" >';
		echo "<option value=''>--Select--</option>";
	foreach($sp as $ksp=>$vsp){
		echo "<option value='$ksp'>$vsp</option>";
	}
	echo '</select>';
	}else{echo 'null';}
}
$SUP_SPECIALIZATION= array(
						'1' => array(
							'58'=>"Grandparent",
							'59'=>"Parent",
							'60'=>"Uncle / Aunt",
							'61'=>"Sibling",
							'62'=>"Villain / Vamp",
							'63'=>"Friend",
							'64'=>"Spouse",														
							'65'=>"Servant",
							'66'=>"Shopkeeper",
							'67'=>"Office staff",
							'68'=>"Office boss",
							'69'=>"Other",
							),
							
						'3' => array(
							'70'=>"Musical",
							'71'=>"Melodrama",
							'72'=>"Tragedy",
							'73'=>"Comedy",
							),
					
					'10' => array(
							'4'=>"Blind Actor",
							'1'=>"Body Double Actor",
							'5'=>"Deaf Actor",
							'3'=>"Dwarf Actor",
							'2'=>"Look-a-like Actor",
							'7'=>"Mimic Actor",
							'6'=>"Nude Actor",
							'74'=>"Mute Actor",
							'75'=>"Child-like Actor",
							'76'=>"Mental disability Role",
							),
					'12' => array(
							'8'=>"Bharatnatyam",
							'9'=>"Kathak",
							'429'=>"Kathakali",
							'430'=>"Mohiniyattam",
							),
					'13' => array(
							'21'=>"Ballet",
							'12'=>"Ballroom",
							'22'=>"Belly Dance",
							'15'=>"Disco Dance",
							'23'=>"Flamenco",
							'24'=>"Hip Hop",
							'10'=>"Jazz Dance",
							'19'=>"Jive",
							'13'=>"Locking",
							'25'=>"Lyrical",
							'16'=>"Mambo",
							'14'=>"Popping",
							'17'=>"Rumba",
							'20'=>"Salsa",
							'18'=>"Samba",
							'11'=>"Tap Dance",
							'26'=>"Zumba",
							'77'=>"Break dance",
							'78'=>"Cheerleading",
							'79'=>"Country",
							'80'=>"Erotic",
							'81'=>"Latin",
							'82'=>"Modern",
							'83'=>"Novelty and Fad",
							'84'=>"Square dance",
							'85'=>"Swing dance",
							'86'=>"Tango",
							'87'=>"Western",
							'427'=>"Aerial",
							),
					'14' => array(
							'34'=>"Bhangra",
							'35'=>"Bihu",
							'33'=>"Chholiya",
							'28'=>"Garba",
							'32'=>"Ghoomar",
							'31'=>"Kalbelia",
							'27'=>"Kuchipudi",
							'36'=>"Manipuri",
							'29'=>"Odissi",
							'30'=>"Sattriya",
							),
					'16' => array(
							'41'=>"Corporate Films",
							'37'=>"Documentary",
							'38'=>"Docu-drama",
							'40'=>"Feature Films",
							'39'=>"Radio",
							'42'=>"Theatre",
							'43'=>"Others",
							),
					'17' => array(
							'45'=>"Advertisement dubs",
							'88'=>"Docu-drama",
							'44'=>"Film dubs",
							'46'=>"Radio ads",
							'47'=>"Radio shows",
							),
					'37' => array(
							'96'=>'Ghazal',
							'48'=>"Indian Classical",
							'49'=>"Western Classical",
							),
					'38' => array(
							//'45'=>"Advertisement dubs",
							'53'=>"Bollywood",
							'51'=>"Country Music",
							'425'=>"Hip Hop",
							'54'=>"Indian Pop",
							'50'=>"Rhythm & Blues",
							'52'=>"Rock",
							),				
					'40' => array(
							'98'=>'Awdhi',
							'89'=>"Bhangra",
							'90'=>"Bhojpuri",
							'91'=>"Bihu",
							'97'=>'Bundelkhandi',
							'92'=>"Carnatic",
							'93'=>"Garba",
							'94'=>"Lavani",
							'95'=>"Sufi",							
							),
					
					'57' => array(
							'424'=>'Acapella',
							'99'=>'Acoustic',
							'100'=>'Alternative',
							'101'=>'Alternative Rock',
							'102'=>'Ambient',
							'103'=>'Americana',
							'104'=>'Avante Garde',
							'105'=>'Blues',
							'106'=>'Bollywood',
							'107'=>'Classic Rock',
							'108'=>'Country',
							'109'=>'Electro Pop',
							'110'=>'Electronica',
							'111'=>'Experimental Rock',
							'112'=>'Folk',
							'113'=>'Garage',
							'114'=>'Groove',
							'115'=>'Grunge',
							'116'=>'Hard Rock',
							'117'=>'Hip Hop',
							'118'=>'Indie',
							'119'=>'Indie Electro',
							'120'=>'Indie Pop',
							'121'=>'Indie Punk',
							'122'=>'Indie Rock',
							'123'=>'Instrumental',
							'124'=>'Jazz',
							'125'=>'Jazz Fusion',
							'126'=>'Lo-Fi',
							'127'=>'Melodic Rock',
							'128'=>'Metal',
							'129'=>'Metal Core',
							'130'=>'Modern Rock',
							'131'=>'New Wave',
							'132'=>'Opera',
							'133'=>'Pop',
							'134'=>'Pop Punk',
							'135'=>'Pop Rock',
							'136'=>'Power Pop',
							'137'=>'Progressive',
							'138'=>'Progressive Metal',
							'139'=>'Psychedelic',
							'140'=>'Psychobilly',
							'141'=>'Punk',
							'142'=>'Punk Rock',
							'143'=>'Qawwali',
							'144'=>'Reggae',
							'145'=>'Rock',
							'146'=>'Rockabilly',
							'147'=>'Soft Rock',
							'148'=>'Sufi',
							'149'=>'Surf Pop',
							'150'=>'Swing',
							'151'=>'Techno',
							'152'=>'Twee',
							'153'=>'Other',
						  ),
					'58' => array(
							'154'=>'Alphorn',
							'155'=>'Baritone Horn',
							'156'=>'Conch',
							'157'=>'Cornet',
							'158'=>'Didgeridoo',
							'159'=>'Euphonium',
							'160'=>'Flugelhorn',
							'161'=>'Horn',
							'162'=>'Keyed Bugle',
							'163'=>'Keyed Trumpet',
							'164'=>'Lur',
							'165'=>'Natural Horn',
							'166'=>'Ophicleide',
							'167'=>'Rozhok',
							'168'=>'Serpent',
							'169'=>'Shofar',
							'170'=>'Tenor Horn',
							'171'=>'Trombones',
							'172'=>'Trumpet',
							'173'=>'Tuba',
							'174'=>'Vuvuzela',
							'175'=>'Other',
						  ),
					'59' => array(
							'176'=>'Alto clarinet',
							'177'=>'Bass clarinet',
							'178'=>'Basset clarinet',
							'179'=>'Basset horn',
							'180'=>'Contra - alto clarinet',
							'181'=>'Contrabass clarinet',
							'182'=>'Piccolo clarinet',
							'183'=>'Soprano clarinet',
							'184'=>'Other',
						  ),
					'60' => array(
							'185'=>'Ancient Cymbal',
							'186'=>'Angklung',
							'187'=>'Bell Cymbal',
							'188'=>'Celesta',
							'189'=>'Chime Bar',
							'190'=>'China cymbal',
							'191'=>'Cimbalom',
							'192'=>'Claves',
							'193'=>'Cowbell',
							'194'=>'Crash Cymbal',
							'195'=>'Crotale',
							'196'=>'Cup Chime',
							'197'=>'Finger Cymbal',
							'198'=>'Glockenspiel',
							'199'=>'Gong',
							'200'=>'Guiro',
							'201'=>'Hammered Dulcimer',
							'202'=>'Hand Bell',
							'203'=>'Hi-Hat',
							'204'=>'Janggo',
							'205'=>'Kalimba',
							'206'=>'Keyboard Glockenspiel',
							'207'=>'Lithophone',
							'208'=>'Maracas',
							'209'=>'Marimba',
							'210'=>'Metallophone',
							'211'=>'Octoban',
							'212'=>'Quadrangularis  Revwersum',
							'213'=>'Ride cymbal',
							'214'=>'Rototam',
							'215'=>'Shaker',
							'216'=>'Sistrum',
							'217'=>'Sizzle Cymbal',
							'218'=>'Skrabalai',
							'219'=>'Slide Whistle',
							'220'=>'Splash',
							'221'=>'Suspended cymbal',
							'222'=>'Swish',
							'223'=>'Taal /Manjeera',
							'224'=>'Tam Tam',
							'225'=>'Temple Block',
							'226'=>'Triangle',
							'227'=>'Tubular Bells',
							'228'=>'Vibraphone',
							'229'=>'Whistle',
							'230'=>'Wind Chimes',
							'231'=>'Wood Block',
							'232'=>'Xylorimba',
							'233'=>'Other',
						  ),
					'61' => array(
							'234'=>'Aburukuwa',
							'235'=>'Ashiko',
							'236'=>'Bass drum',
							'237'=>'Bata',
							'238'=>'Bedug',
							'239'=>'Bodhran',
							'240'=>'Bongo drums',
							'241'=>'Bougarabou',
							'242'=>'Box drum',
							'243'=>'Cajon',
							'244'=>'Candombe drums',
							'245'=>'Chalice drum',
							'246'=>'Chenda',
							'247'=>'Cocktail drum',
							'248'=>'Conga',
							'249'=>'Damphu',
							'250'=>'Damru',
							'251'=>'Darbuka',
							'252'=>'Davul',
							'253'=>'Dayereh',
							'254'=>'Dhak',
							'255'=>'Dhimay',
							'256'=>'Dhol',
							'257'=>'Dholak',
							'258'=>'Dimri',
							'259'=>'Djembe',
							'260'=>'Dong Son drum',
							'261'=>'Doumbek',
							'262'=>'Dunun',
							'263'=>'Ewe Drums',
							'264'=>'Frame drum',
							'265'=>'Friction drum',
							'266'=>'Goblet drum',
							'267'=>'Hand drum',
							'268'=>'Ilimba drum',
							'269'=>'Jug drum',
							'270'=>'Karyenda',
							'271'=>'Kettle drum',
							'272'=>'Kpanlogo',
							'273'=>'Lambeg drum',
							'274'=>'Log drum',
							'275'=>'Madal',
							'276'=>'Mridangam',
							'277'=>'Nagada',
							'278'=>'Pandeiro',
							'279'=>'Repinique',
							'280'=>'Side drum (Marching snare drum)',
							'281'=>'Slit log drum (slit drum, log drum)',
							'282'=>'Snare drum',
							'283'=>'Standing drum',
							'284'=>'Steelpan (Steel drum)',
							'285'=>'Stir drum',
							'286'=>'Surdo',
							'287'=>'Tabla',
							'288'=>'Tabor',
							'289'=>'Taiko',
							'290'=>'Talking drum',
							'291'=>'Tamborim',
							'292'=>'Tambourine',
							'293'=>'Tapan',
							'294'=>'Tar',
							'295'=>'Tavil',
							'296'=>'Tenor drum',
							'297'=>'Timbales',
							'298'=>'Timpani',
							'299'=>'Tom-tom drum',
							'300'=>'Tombak',
							'301'=>'Tongue drum',
							'302'=>'Tumbak',
							'303'=>'Two-headed drum',
							'304'=>'Other',
						  ),
					'62' => array(
							'305'=>'Denis d\'or',
							'306'=>'Drum machine',
							'307'=>'Ebow',
							'308'=>'Omnichord',
							'309'=>'Ondes Martenot',
							'310'=>'Stylophone',
							'311'=>'Synthesizer',
							'312'=>'Teleharmonium',
							'313'=>'Theremin',
							'314'=>'Vocoder',
							'315'=>'Wavedrum',
							'316'=>'Other',
						  ),
					'63' => array(
							'317'=>'Chinese flutes',
							'318'=>'Contrabass',
							'319'=>'Dizi',
							'320'=>'Double contrabass',
							'321'=>'Fife',
							'322'=>'Hyperbass',
							'323'=>'Indian flutes',
							'324'=>'Irish Tin Whistle',
							'325'=>'Japanese flutes',
							'326'=>'Ocarina',
							'327'=>'Panpipes',
							'328'=>'Recorder',
							'329'=>'Sodina and suling',
							'330'=>'Sring',
							'331'=>'Suling',
							'332'=>'Western concert flute',
							'333'=>'Other',
						  ),
					'64' => array(
							'334'=>'Acoustic',
							'335'=>'Archtop',
							'336'=>'Bass',
							'337'=>'Double-neck',
							'338'=>'Electric',
							'339'=>'Electric - Acoustic',
							'340'=>'Resonator',
							'341'=>'Steel',
							'342'=>'Twelve-string',
							'343'=>'Other',
							'426' => 'Spanish Guitar',
							'428' => 'Rythm guitar',
						  ),
					'65' => array(
							'344'=>'Baby grand',
							'345'=>'Ballroom/ Semi-concert grand',
							'346'=>'Concert grand',
							'347'=>'Console vertical',
							'348'=>'Consolette vertical',
							'349'=>'Electric',
							'350'=>'Full-size vertical',
							'351'=>'Parlor/ medium grand',
							'352'=>'Petite grand',
							'353'=>'Spinet vertical',
							'354'=>'Square grand',
							'355'=>'Studio vertical',
							'356'=>'Other',
						  ),
					'66' => array(
							'357'=>'Balalaika',
							'358'=>'Berimbau',
							'359'=>'Charango',
							'360'=>'Chinese bowed string',
							'361'=>'Dotara',
							'362'=>'Dranyen',
							'363'=>'Ektara',
							'364'=>'Guqin',
							'365'=>'Gusli',
							'366'=>'Guzheng',
							'367'=>'Kantele',
							'368'=>'Koto',
							'369'=>'Lyra and Rebec type (bowed string)',
							'370'=>'Mandolin',
							'371'=>'Nyatiti',
							'372'=>'Oud',
							'373'=>'Pipa',
							'374'=>'Rosined wheel (bowed string)',
							'375'=>'Rubab',
							'376'=>'Saz / Baglama',
							'377'=>'Santoor',
							'378'=>'Sarangi',
							'379'=>'Sarod',
							'380'=>'Sitar',
							'381'=>'Tambura',
							'382'=>'Tanpura',
							'383'=>'Tumbi',
							'384'=>'Tuntuna',
							'385'=>'Veena',
							'386'=>'Viol',
							'387'=>'Violin',
							'388'=>'Waldzither',
							'389'=>'Yangqin',
							'390'=>'Other',
						  ),
					'67' => array(
							'391'=>'Been (pungi)',
							'392'=>'Didgiridoo',
							'393'=>'Piccolo',
							'394'=>'Oboe',
							'395'=>'Cor anglais',
							'396'=>'Bagpipes',
							'397'=>'Bassoon',
							'398'=>'Saxophone',
							'399'=>'Shehnai',
							'400'=>'Contrabassoon',
							'401'=>'Recorder',
							'402'=>'Other',
						  ),
					'68' => array(
							'403'=>'Accordionist',
							'404'=>'Bassist',
							'405'=>'Bouzouki player',
							'406'=>'Cellist',
							'407'=>'Harpist',
							'408'=>'Keyboardist',
							'409'=>'Organ grinder',
							'410'=>'Organist',
							'411'=>'Other',
						  ),
					'69' => array(
							'412'=>'Akadinda and Amadinda',
							'413'=>'Balafon',
							'414'=>'Embaire',
							'415'=>'Gambang',
							'416'=>'Gyil',
							'417'=>'Kashta Tarang',
							'418'=>'Khmer',
							'419'=>'Kulintang a Kayo',
							'420'=>'Luntang',
							'421'=>'Malimbe',
							'422'=>'Mbila',
							'423'=>'Other',
						  ),
				);

if(isset($_REQUEST['specs'])){
	$sp1 = $SUP_SPECIALIZATION[$_REQUEST['specs']];		
	$block_arr = explode(',',$_REQUEST['block']);
	if($sp1 >= 1){
	echo '<select tabindex="44" title="Please Select Your Super Specialization" class="required error h_select" name="super_specialization'.(($_REQUEST['id'] != '') ? $_REQUEST['id'] : '' ).'" id="supspecs'.(($_REQUEST['id'] != '') ? $_REQUEST['id'] : '' ).'">';
	echo "<option value=''>--Select--</option>";
	foreach($sp1 as $ksp1=>$vsp1){
		echo "<option value='$ksp1' ".(in_array($ksp1,$block_arr) ? 'disabled="disabled"' : '' ).">$vsp1</option>";
	}
	echo '</select>';
	}else{echo 'null'; exit;}
}		

if(isset($_REQUEST['add_specs'])){
	//print_r($SUP_SPECIALIZATION[$_REQUEST['specs']]);
	$sp1 = $SUP_SPECIALIZATION[$_REQUEST['add_specs']];		
	$block_arr = explode(',',$_REQUEST['block']);
	if($sp1 >= 1){
	echo '<select tabindex="44" title="Please Select Your Super Specialization" class="required error h_select" name="super_specialization_add" id="supspecs_add">';
	echo "<option value=''>--Select--</option>";
	foreach($sp1 as $ksp1=>$vsp1){
		echo "<option value='$ksp1' ".(in_array($ksp1,$block_arr) ? 'disabled="disabled"' : '' ).">$vsp1</option>";
	}
	echo '</select>';
	}else{echo 'null'; exit;}
}

if(isset($_REQUEST['band_member_details']) && $_REQUEST['band_member_details'] == 1 && $_REQUEST['total'] != ''){
	$id = trim($_REQUEST['id']); $total = trim($_REQUEST['total']); $previous = trim($_REQUEST['previous']);
	$add = (isset($_REQUEST['add']) && $_REQUEST['add'] == 1) ? '_add_' : '_';
	$add_cls = (isset($_REQUEST['add']) && $_REQUEST['add'] == 1) ? '_add' : '';
	
	$html = ''; $html_part = ''; $html_part1 = '';
	if($total > 0 && $total <= 20){
		$html_part .= "<option value=''>Select Specializations</option>";
		$SPECIALIZATION[9]['70'] = 'Vocalist';
		foreach($SPECIALIZATION[9] as $ksp1=>$vsp1){
			if($ksp1 == 57)continue;
			$html_part .= "<option value='$ksp1'>$vsp1</option>";
		}
		if(isset($_REQUEST['previous']) && $total > $previous){
			$tabindex1 = 40+(3*$previous); $tabindex2 = $tabindex1+1;
			for($i=$previous+1; $i<=$total; $i++){
				$html .= '<input name="band_member_name_'.$id.$add.$i.'" id="band_member_name_'.$id.$add.$i.'" type="text" tabindex="'.$tabindex1.'"  placeholder="Member'.$i.' Name" style="width: 35%; clear:both;" class="valid_fullname band_member_name_input"/><div class="band_mem_spe_class"><select id="member_specialization_'.$id.$add.$i.'" tabindex="'.$tabindex2.'" title="'.$id.$add.$i.'" name="member_specialization_'.$id.$add.$i.'" style="margin-left: 10px;width: 27%;" class="h_select member_specialization'.$add_cls.' required_band_specialization">'.$html_part.'</select></div><div class="add_member_super_specialization" id="member_specialization_'.$id.$add.$i.'_div"></div><div style="clear:both;"></div>';
				$tabindex1 = $tabindex2+2; $tabindex2 = $tabindex1+1;
			}
			
		}else{
			$html_part1 .= '<label class="same_label" style="font-size: 13px;padding: 10px 0 0;">Name and expertise of each member :</label><div class="cl"></div>';
			$tabindex1 = 40; $tabindex2 = 41;
			for($i=1; $i<=$total; $i++){
				$html .= '<input name="band_member_name_'.$id.$add.$i.'" id="band_member_name_'.$id.$add.$i.'" type="text" tabindex="'.$tabindex1.'"  placeholder="Member'.$i.' Name" style="width: 35%; clear:both;" class="valid_fullname band_member_name_input"/><div class="band_mem_spe_class"><select id="member_specialization_'.$id.$add.$i.'" tabindex="'.$tabindex2.'" title="'.$id.$add.$i.'" name="member_specialization_'.$id.$add.$i.'" style="margin-left: 10px;width: 27%;" class="h_select member_specialization'.$add_cls.' required_band_specialization">'.$html_part.'</select></div><div class="add_member_super_specialization" id="member_specialization_'.$id.$add.$i.'_div"></div><div style="clear:both;"></div>';
				$tabindex1 = $tabindex2+2; $tabindex2 = $tabindex1+1;
			}
		}
	}
	unset($SPECIALIZATION[9]['70']);
	echo $html_part1.$html; exit;
}
elseif(isset($_REQUEST['band_mem_super_specialization']) && $_REQUEST['band_mem_super_specialization'] == 1 && $_REQUEST['value'] != ''){
	$id = trim($_REQUEST['id']); $value = trim($_REQUEST['value']); $tabindex = trim($_REQUEST['tabindex']);
	$html = ''; $html_part = '';
	if(is_array($SUP_SPECIALIZATION[$value])){
		$html_part .= "<option value=''>Select Super Specializations</option>";
		foreach($SUP_SPECIALIZATION[$value] as $ksp1=>$vsp1){
			$html_part .= "<option value='$ksp1'>$vsp1</option>";
		}
		$html .= '<select tabindex="'.($tabindex+1).'" title="Select Super Specialization" name="member_super_specialization_'.$id.'" id="member_super_specialization_'.$id.'" style="margin-left: 10px;width: 27%;" class="h_select">'.$html_part.'</select>';
	}
	echo $html; exit;
}

/* START Stunt artist crew member code added by sunil 28/052015 */
if(isset($_REQUEST['crew_member_details']) && $_REQUEST['crew_member_details'] == 1 && $_REQUEST['total'] != ''){
	$id = trim($_REQUEST['id']); $total = trim($_REQUEST['total']); $previous = trim($_REQUEST['previous']);
	$add = (isset($_REQUEST['add']) && $_REQUEST['add'] == 1) ? '_add_' : '_';
	$add_cls = (isset($_REQUEST['add']) && $_REQUEST['add'] == 1) ? '_add' : '';
	
	$html = ''; $html_part = ''; $html_part1 = '';
	if($total > 0 && $total <= 20){
		$html_part .= "<option value=''>Select Specializations</option>";
		//$SPECIALIZATION[9]['70'] = 'Vocalist';
		foreach($SPECIALIZATION[7] as $ksp1=>$vsp1){
			if($ksp1 == 77)continue;
			$html_part .= "<option value='$ksp1'>$vsp1</option>";
		}
		if(isset($_REQUEST['previous']) && $total > $previous){
			$tabindex1 = 40+(3*$previous); $tabindex2 = $tabindex1+1;
			for($i=$previous+1; $i<=$total; $i++){
				$html .= '<input name="crew_member_name_'.$id.$add.$i.'" id="crew_member_name_'.$id.$add.$i.'" type="text" tabindex="'.$tabindex1.'"  placeholder="Member'.$i.' Name" style="width: 35%; clear:both;" class="valid_fullname crew_member_name_input"/><div class="crew_mem_spe_class"><select id="crew_member_specialization_'.$id.$add.$i.'" tabindex="'.$tabindex2.'" title="'.$id.$add.$i.'" name="crew_member_specialization_'.$id.$add.$i.'" style="margin-left: 10px;width: 27%;" class="h_select crew_member_specialization'.$add_cls.' required_crew_specialization">'.$html_part.'</select></div><div class="add_member_super_specialization" id="crew_member_specialization_'.$id.$add.$i.'_div"></div><div style="clear:both;"></div>';
				$tabindex1 = $tabindex2+2; $tabindex2 = $tabindex1+1;
			}
			
		}else{
			$html_part1 .= '<label class="same_label" style="font-size: 13px;padding: 10px 0 0;">Name and expertise of each member :</label><div class="cl"></div>';
			$tabindex1 = 40; $tabindex2 = 41;
			for($i=1; $i<=$total; $i++){
				$html .= '<input name="crew_member_name_'.$id.$add.$i.'" id="crew_member_name_'.$id.$add.$i.'" type="text" tabindex="'.$tabindex1.'"  placeholder="Member'.$i.' Name" style="width: 35%; clear:both;" class="valid_fullname crew_member_name_input"/><div class="crew_mem_spe_class"><select id="crew_member_specialization_'.$id.$add.$i.'" tabindex="'.$tabindex2.'" title="'.$id.$add.$i.'" name="crew_member_specialization_'.$id.$add.$i.'" style="margin-left: 10px;width: 27%;" class="h_select crew_member_specialization'.$add_cls.' required_crew_specialization">'.$html_part.'</select></div><div class="add_member_super_specialization" id="crew_member_specialization_'.$id.$add.$i.'_div"></div><div style="clear:both;"></div>';
				$tabindex1 = $tabindex2+2; $tabindex2 = $tabindex1+1;
			}
		}
	}
	//unset($SPECIALIZATION[9]['70']);
	echo $html_part1.$html; exit;
}
elseif(isset($_REQUEST['crew_mem_super_specialization']) && $_REQUEST['crew_mem_super_specialization'] == 1 && $_REQUEST['value'] != ''){
	$id = trim($_REQUEST['id']); $value = trim($_REQUEST['value']); $tabindex = trim($_REQUEST['tabindex']);
	$html = ''; $html_part = '';
	if(is_array($SUP_SPECIALIZATION[$value])){
		$html_part .= "<option value=''>Select Super Specializations</option>";
		foreach($SUP_SPECIALIZATION[$value] as $ksp1=>$vsp1){
			$html_part .= "<option value='$ksp1'>$vsp1</option>";
		}
		$html .= '<select tabindex="'.($tabindex+1).'" title="Select Super Specialization" name="member_super_specialization_'.$id.'" id="member_super_specialization_'.$id.'" style="margin-left: 10px;width: 27%;" class="h_select">'.$html_part.'</select>';
	}
	echo $html; exit;
}
/* END Stunt artist crew member code added by sunil */


$SUP_SPECIALIZATION_SD= array(
							'58'=>"Grandparent",
							'59'=>"Parent",
							'60'=>"Uncle / Aunt",
							'61'=>"Sibling",
							'62'=>"Villain / Vamp",
							'63'=>"Friend",
							'64'=>"Spouse",														
							'65'=>"Servant",
							'66'=>"Shopkeeper",
							'67'=>"Office staff",
							'68'=>"Office boss",
							'69'=>"Other",
							'70'=>"Musical",
							'71'=>"Melodrama",
							'72'=>"Tragedy",
							'73'=>"Comedy",
							'4'=>"Blind Actor",
							'1'=>"Body Double Actor",
							'5'=>"Deaf Actor",
							'3'=>"Dwarf Actor",
							'2'=>"Look-a-like Actor",
							'7'=>"Mimic Actor",
							'6'=>"Nude Actor",
							'74'=>"Mute Actor",
							'75'=>"Child-like Actor",
							'76'=>"Mental disability Role",
							'8'=>"Bharatnatyam",
							'9'=>"Kathak",
							'21'=>"Ballet",
							'12'=>"Ballroom",
							'22'=>"Belly Dance",
							'15'=>"Disco Dance",
							'23'=>"Flamenco",
							'24'=>"Hip Hop",
							'10'=>"Jazz Dance",
							'19'=>"Jive",
							'13'=>"Locking",
							'25'=>"Lyrical",
							'16'=>"Mambo",
							'14'=>"Popping",
							'17'=>"Rumba",
							'20'=>"Salsa",
							'18'=>"Samba",
							'11'=>"Tap Dance",
							'26'=>"Zumba",
							'77'=>"Break dance",
							'78'=>"Cheerleading",
							'79'=>"Country",
							'80'=>"Erotic",
							'81'=>"Latin",
							'82'=>"Modern",
							'83'=>"Novelty and Fad",
							'84'=>"Square dance",
							'85'=>"Swing dance",
							'86'=>"Tango",
							'87'=>"Western",
							'34'=>"Bhangra",
							'35'=>"Bihu",
							'33'=>"Chholiya",
							'28'=>"Garba",
							'32'=>"Ghoomar",
							'31'=>"Kalbelia",
							'27'=>"Kuchipudi",
							'36'=>"Manipuri",
							'29'=>"Odissi",
							'30'=>"Sattriya",
							'41'=>"Corporate Films",
							'37'=>"Documentary",
							'88'=>"Docu-drama",
							'40'=>"Feature Films",
							'39'=>"Radio",
							'42'=>"Theatre",
							'43'=>"Others",
							'45'=>"Advertisement dubs",
							'38'=>"Docu-drama",
							'44'=>"Film dubs",
							'46'=>"Radio ads",
							'47'=>"Radio shows",
							'48'=>"Indian Classical",
							'49'=>"Western Classical",
							//'45'=>"Advertisement dubs",
							'53'=>"Bollywood",
							'51'=>"Country Music",
							'425'=>"Hip Hop",
							'54'=>"Indian Pop",
							'50'=>"Rhythm & Blues",
							'52'=>"Rock",
							'89'=>"Bhangra",
							'90'=>"Bhojpuri",
							'91'=>"Bihu",
							'92'=>"Carnatic",
							'93'=>"Garba",
							'94'=>"Lavani",
							'95'=>"Sufi",
							'96'=>'Ghazal',
							'97'=>'Bundelkhandi',
							'98'=>'Awdhi',
							
							'424'=>'Acapella',
							'99'=>'Acoustic',
							'100'=>'Alternative',
							'101'=>'Alternative Rock',
							'102'=>'Ambient',
							'103'=>'Americana',
							'104'=>'Avante Garde',
							'105'=>'Blues',
							'106'=>'Bollywood',
							'107'=>'Classic Rock',
							'108'=>'Country',
							'109'=>'Electro Pop',
							'110'=>'Electronica',
							'111'=>'Experimental Rock',
							'112'=>'Folk',
							'113'=>'Garage',
							'114'=>'Groove',
							'115'=>'Grunge',
							'116'=>'Hard Rock',
							'117'=>'Hip Hop',
							'118'=>'Indie',
							'119'=>'Indie Electro',
							'120'=>'Indie Pop',
							'121'=>'Indie Punk',
							'122'=>'Indie Rock',
							'123'=>'Instrumental',
							'124'=>'Jazz',
							'125'=>'Jazz Fusion',
							'126'=>'Lo-Fi',
							'127'=>'Melodic Rock',
							'128'=>'Metal',
							'129'=>'Metal Core',
							'130'=>'Modern Rock',
							'131'=>'New Wave',
							'132'=>'Opera',
							'133'=>'Pop',
							'134'=>'Pop Punk',
							'135'=>'Pop Rock',
							'136'=>'Power Pop',
							'137'=>'Progressive',
							'138'=>'Progressive Metal',
							'139'=>'Psychedelic',
							'140'=>'Psychobilly',
							'141'=>'Punk',
							'142'=>'Punk Rock',
							'143'=>'Qawwali',
							'144'=>'Reggae',
							'145'=>'Rock',
							'146'=>'Rockabilly',
							'147'=>'Soft Rock',
							'148'=>'Sufi',
							'149'=>'Surf Pop',
							'150'=>'Swing',
							'151'=>'Techno',
							'152'=>'Twee',
							'153'=>'Other',
							'154'=>'Alphorn',
							'155'=>'Baritone Horn',
							'156'=>'Conch',
							'157'=>'Cornet',
							'158'=>'Didgeridoo',
							'159'=>'Euphonium',
							'160'=>'Flugelhorn',
							'161'=>'Horn',
							'162'=>'Keyed Bugle',
							'163'=>'Keyed Trumpet',
							'164'=>'Lur',
							'165'=>'Natural Horn',
							'166'=>'Ophicleide',
							'167'=>'Rozhok',
							'168'=>'Serpent',
							'169'=>'Shofar',
							'170'=>'Tenor Horn',
							'171'=>'Trombones',
							'172'=>'Trumpet',
							'173'=>'Tuba',
							'174'=>'Vuvuzela',
							'175'=>'Other',
							'176'=>'Alto clarinet',
							'177'=>'Bass clarinet',
							'178'=>'Basset clarinet',
							'179'=>'Basset horn',
							'180'=>'Contra - alto clarinet',
							'181'=>'Contrabass clarinet',
							'182'=>'Piccolo clarinet',
							'183'=>'Soprano clarinet',
							'184'=>'Other',
							'185'=>'Ancient Cymbal',
							'186'=>'Angklung',
							'187'=>'Bell Cymbal',
							'188'=>'Celesta',
							'189'=>'Chime Bar',
							'190'=>'China cymbal',
							'191'=>'Cimbalom',
							'192'=>'Claves',
							'193'=>'Cowbell',
							'194'=>'Crash Cymbal',
							'195'=>'Crotale',
							'196'=>'Cup Chime',
							'197'=>'Finger Cymbal',
							'198'=>'Glockenspiel',
							'199'=>'Gong',
							'200'=>'Guiro',
							'201'=>'Hammered Dulcimer',
							'202'=>'Hand Bell',
							'203'=>'Hi-Hat',
							'204'=>'Janggo',
							'205'=>'Kalimba',
							'206'=>'Keyboard Glockenspiel',
							'207'=>'Lithophone',
							'208'=>'Maracas',
							'209'=>'Marimba',
							'210'=>'Metallophone',
							'211'=>'Octoban',
							'212'=>'Quadrangularis  Revwersum',
							'213'=>'Ride cymbal',
							'214'=>'Rototam',
							'215'=>'Shaker',
							'216'=>'Sistrum',
							'217'=>'Sizzle Cymbal',
							'218'=>'Skrabalai',
							'219'=>'Slide Whistle',
							'220'=>'Splash',
							'221'=>'Suspended cymbal',
							'222'=>'Swish',
							'223'=>'Taal /Manjeera',
							'224'=>'Tam Tam',
							'225'=>'Temple Block',
							'226'=>'Triangle',
							'227'=>'Tubular Bells',
							'228'=>'Vibraphone',
							'229'=>'Whistle',
							'230'=>'Wind Chimes',
							'231'=>'Wood Block',
							'232'=>'Xylorimba',
							'233'=>'Other',
							'234'=>'Aburukuwa',
							'235'=>'Ashiko',
							'236'=>'Bass drum',
							'237'=>'Bata',
							'238'=>'Bedug',
							'239'=>'Bodhran',
							'240'=>'Bongo drums',
							'241'=>'Bougarabou',
							'242'=>'Box drum',
							'243'=>'Cajon',
							'244'=>'Candombe drums',
							'245'=>'Chalice drum',
							'246'=>'Chenda',
							'247'=>'Cocktail drum',
							'248'=>'Conga',
							'249'=>'Damphu',
							'250'=>'Damru',
							'251'=>'Darbuka',
							'252'=>'Davul',
							'253'=>'Dayereh',
							'254'=>'Dhak',
							'255'=>'Dhimay',
							'256'=>'Dhol',
							'257'=>'Dholak',
							'258'=>'Dimri',
							'259'=>'Djembe',
							'260'=>'Dong Son drum',
							'261'=>'Doumbek',
							'262'=>'Dunun',
							'263'=>'Ewe Drums',
							'264'=>'Frame drum',
							'265'=>'Friction drum',
							'266'=>'Goblet drum',
							'267'=>'Hand drum',
							'268'=>'Ilimba drum',
							'269'=>'Jug drum',
							'270'=>'Karyenda',
							'271'=>'Kettle drum',
							'272'=>'Kpanlogo',
							'273'=>'Lambeg drum',
							'274'=>'Log drum',
							'275'=>'Madal',
							'276'=>'Mridangam',
							'277'=>'Nagada',
							'278'=>'Pandeiro',
							'279'=>'Repinique',
							'280'=>'Side drum (Marching snare drum)',
							'281'=>'Slit log drum (slit drum, log drum)',
							'282'=>'Snare drum',
							'283'=>'Standing drum',
							'284'=>'Steelpan (Steel drum)',
							'285'=>'Stir drum',
							'286'=>'Surdo',
							'287'=>'Tabla',
							'288'=>'Tabor',
							'289'=>'Taiko',
							'290'=>'Talking drum',
							'291'=>'Tamborim',
							'292'=>'Tambourine',
							'293'=>'Tapan',
							'294'=>'Tar',
							'295'=>'Tavil',
							'296'=>'Tenor drum',
							'297'=>'Timbales',
							'298'=>'Timpani',
							'299'=>'Tom-tom drum',
							'300'=>'Tombak',
							'301'=>'Tongue drum',
							'302'=>'Tumbak',
							'303'=>'Two-headed drum',
							'304'=>'Other',
							'305'=>'Denis d\'or',
							'306'=>'Drum machine',
							'307'=>'Ebow',
							'308'=>'Omnichord',
							'309'=>'Ondes Martenot',
							'310'=>'Stylophone',
							'311'=>'Synthesizer',
							'312'=>'Teleharmonium',
							'313'=>'Theremin',
							'314'=>'Vocoder',
							'315'=>'Wavedrum',
							'316'=>'Other',
							'317'=>'Chinese flutes',
							'318'=>'Contrabass',
							'319'=>'Dizi',
							'320'=>'Double contrabass',
							'321'=>'Fife',
							'322'=>'Hyperbass',
							'323'=>'Indian flutes',
							'324'=>'Irish Tin Whistle',
							'325'=>'Japanese flutes',
							'326'=>'Ocarina',
							'327'=>'Panpipes',
							'328'=>'Recorder',
							'329'=>'Sodina and suling',
							'330'=>'Sring',
							'331'=>'Suling',
							'332'=>'Western concert flute',
							'333'=>'Other',
							'334'=>'Acoustic',
							'335'=>'Archtop',
							'336'=>'Bass',
							'337'=>'Double-neck',
							'338'=>'Electric',
							'339'=>'Electric - Acoustic',
							'340'=>'Resonator',
							'341'=>'Steel',
							'342'=>'Twelve-string',
							'343'=>'Other',
							'344'=>'Baby grand',
							'345'=>'Ballroom/ Semi-concert grand',
							'346'=>'Concert grand',
							'347'=>'Console vertical',
							'348'=>'Consolette vertical',
							'349'=>'Electric',
							'350'=>'Full-size vertical',
							'351'=>'Parlor/ medium grand',
							'352'=>'Petite grand',
							'353'=>'Spinet vertical',
							'354'=>'Square grand',
							'355'=>'Studio vertical',
							'356'=>'Other',
							'357'=>'Balalaika',
							'358'=>'Berimbau',
							'359'=>'Charango',
							'360'=>'Chinese bowed string',
							'361'=>'Dotara',
							'362'=>'Dranyen',
							'363'=>'Ektara',
							'364'=>'Guqin',
							'365'=>'Gusli',
							'366'=>'Guzheng',
							'367'=>'Kantele',
							'368'=>'Koto',
							'369'=>'Lyra and Rebec type (bowed string)',
							'370'=>'Mandolin',
							'371'=>'Nyatiti',
							'372'=>'Oud',
							'373'=>'Pipa',
							'374'=>'Rosined wheel (bowed string)',
							'375'=>'Rubab',
							'376'=>'Saz / Baglama',
							'377'=>'Santoor',
							'378'=>'Sarangi',
							'379'=>'Sarod',
							'380'=>'Sitar',
							'381'=>'Tambura',
							'382'=>'Tanpura',
							'383'=>'Tumbi',
							'384'=>'Tuntuna',
							'385'=>'Veena',
							'386'=>'Viol',
							'387'=>'Violin',
							'388'=>'Waldzither',
							'389'=>'Yangqin',
							'390'=>'Other',
							'391'=>'Been (pungi)',
							'392'=>'Didgiridoo',
							'393'=>'Piccolo',
							'394'=>'Oboe',
							'395'=>'Cor anglais',
							'396'=>'Bagpipes',
							'397'=>'Bassoon',
							'398'=>'Saxophone',
							'399'=>'Shehnai',
							'400'=>'Contrabassoon',
							'401'=>'Recorder',
							'402'=>'Other',
							'403'=>'Accordionist',
							'404'=>'Bassist',
							'405'=>'Bouzouki player',
							'406'=>'Cellist',
							'407'=>'Harpist',
							'408'=>'Keyboardist',
							'409'=>'Organ grinder',
							'410'=>'Organist',
							'411'=>'Other',
							'412'=>'Akadinda and Amadinda',
							'413'=>'Balafon',
							'414'=>'Embaire',
							'415'=>'Gambang',
							'416'=>'Gyil',
							'417'=>'Kashta Tarang',
							'418'=>'Khmer',
							'419'=>'Kulintang a Kayo',
							'420'=>'Luntang',
							'421'=>'Malimbe',
							'422'=>'Mbila',
							'423'=>'Other',
							'426'=> 'Spanish Guitar',
							'427'=> 'Aerial',
							'428' => 'Rythm guitar',
							'429'=>'Kathakali',
							'430'=>'Mohiniyattam',					
				);

$EXP_YEAR= array('' => '--Select--');
$PROJECT= array('' => '--Select--');
for ($i = 1; $i < 100; ++$i) {
        $EXP_YEAR[$i] = $i;
        $PROJECT[$i] = $i;
    }				

$MONTHS = array(
		''=>'Month',
		"01"=>"January",
		"02"=>"February",
		"03"=>"March",
		"04"=>"April",
		"05"=>"May",
		"06"=>"June",
		"07"=>"July",
		"08"=>"August",
		"09"=>"September",
		"10"=>"October",
		"11"=>"November",
		"12"=>"December"
	);
$DAY = array(
				''=>'Day'
				,'01'=>'01'
				,'02'=>'02'
				,'03'=>'03'
				,'04'=>'04'
				,'05'=>'05'
				,'06'=>'06'
				,'07'=>'07'
				,'08'=>'08'
				,'09'=>'09'
				,'10'=>'10'
				,'11'=>'11'
				,'12'=>'12'
				,'13'=>'13'
				,'14'=>'14'
				,'15'=>'15'
				,'16'=>'16'
				,'17'=>'17'
				,'18'=>'18'
				,'19'=>'19'
				,'20'=>'20'
				,'21'=>'21'
				,'22'=>'22'
				,'23'=>'23'
				,'24'=>'24'
				,'25'=>'25'
				,'26'=>'26'
				,'27'=>'27'
				,'28'=>'28'
				,'29'=>'29'
				,'30'=>'30'
				,'31'=>'31'
			);	
/*======Height Feet Array=====*/
		$HEIGHT_FEET= array(
  '' => '--Feet--'
  ,"0" =>"0"
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
); 	

/*======Height Inches Array=====*/
		$HEIGHT_INCHES= array(
  '' => '--Inches--'  
  ,"0" =>"0"
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8"=>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
); 	

/*======Shoe size Array=====*/
		$SHOE_SIZE_TYPE= array(
  '' => '--Size types--'
  ,"1" =>"Indian / UK Adult"
  ,"2" =>"Indian / UK Child"
  ,"3" =>"US Adult"
  ,"4" =>"US Child"
  ,"5" =>"Europe Adult"
  ,"6" =>"Europe Child"  
); 	

		$SHOE_SIZE = array(
'1' => array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
  ,"14" =>"14" 
 ),
 
'2' => array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
 ), 	
 
'3' => array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
  ,"14" =>"14" 
  ,"15" =>"15" 
 ),
 
'4' => array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
 ), 	
 
'5' => array(
  '' => '--Size--'
  ,"32" =>"32"
  ,"33" =>"33"
  ,"34"=>"34"
  ,"35"=>"35"
  ,"36"=>"36"
  ,"37" =>"37"
  ,"38" =>"38"
  ,"39" =>"39"
  ,"40" =>"40"
  ,"41" =>"41"
  ,"42" =>"42"
  ,"43" =>"43"
  ,"44" =>"44"
  ,"45"=>"45"
  ,"46"=>"46"
  ,"47"=>"47"
  ,"48"=>"48"
  ,"49" =>"49"
 ),
 
'6' => array(
  '' => '--Size--'
  ,"14" =>"14"
  ,"15" =>"15"
  ,"16" =>"16"
  ,"17" =>"17"
  ,"18" =>"18"
  ,"19" =>"19"
  ,"20"=>"20"
  ,"21"=>"21"
  ,"22"=>"22"
  ,"23"=>"23"
  ,"24" =>"24"
  ,"25" =>"25"
  ,"26" =>"26"
  ,"27" =>"27"
  ,"28" =>"28"
  ,"29" =>"29"
  ,"30" =>"30"
  ,"31" =>"31"
 )
 );
 
/*======Shoe Size Number Array=====*/
		$SHOE_SIZE_UK_ADULT= array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
  ,"14" =>"14" 
 );
 
 $SHOE_SIZE_UK_CHILD= array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
 ); 	
 
 $SHOE_SIZE_US_ADULT= array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
  ,"14" =>"14" 
  ,"15" =>"15" 
 );
 
 $SHOE_SIZE_US_CHILD= array(
  '' => '--Size--'
  ,"1" =>"1"
  ,"2" =>"2"
  ,"3" =>"3"
  ,"4" =>"4"
  ,"5" =>"5"
  ,"6" =>"6"
  ,"7" =>"7"
  ,"8" =>"8"
  ,"9"=>"9"
  ,"10"=>"10"
  ,"11"=>"11"
  ,"12" =>"12"
  ,"13" =>"13"
 ); 	
 
 $SHOE_SIZE_EUROPE_ADULT= array(
  '' => '--Size--'
  ,"32" =>"32"
  ,"33" =>"33"
  ,"34"=>"34"
  ,"35"=>"35"
  ,"36"=>"36"
  ,"37" =>"37"
  ,"38" =>"38"
  ,"39" =>"39"
  ,"40" =>"40"
  ,"41" =>"41"
  ,"42" =>"42"
  ,"43" =>"43"
  ,"44" =>"44"
  ,"45"=>"45"
  ,"46"=>"46"
  ,"47"=>"47"
  ,"48"=>"48"
  ,"49" =>"49"
 );
 
 $SHOE_SIZE_EUROPE_CHILD= array(
  '' => '--Size--'
  ,"14" =>"14"
  ,"15" =>"15"
  ,"16" =>"16"
  ,"17" =>"17"
  ,"18" =>"18"
  ,"19" =>"19"
  ,"20"=>"20"
  ,"21"=>"21"
  ,"22"=>"22"
  ,"23"=>"23"
  ,"24" =>"24"
  ,"25" =>"25"
  ,"26" =>"26"
  ,"27" =>"27"
  ,"28" =>"28"
  ,"29" =>"29"
  ,"30" =>"30"
  ,"31" =>"31"
 );
 
if(isset($_REQUEST['shoe_type']))
{
	$shoe_type = $_REQUEST['shoe_type'];
	if($shoe_type == 1){
		$sp1 = $SHOE_SIZE_UK_ADULT;	
	}
	else if($shoe_type == 2){
		$sp1 = $SHOE_SIZE_UK_CHILD;	
	}
	else if($shoe_type == 3){
		$sp1 = $SHOE_SIZE_US_ADULT;	
	}
	else if($shoe_type == 4){
		$sp1 = $SHOE_SIZE_US_CHILD;	
	}
	else if($shoe_type == 5){
		$sp1 = $SHOE_SIZE_EUROPE_ADULT;	
	}
	else if($shoe_type == 6){
		$sp1 = $SHOE_SIZE_EUROPE_CHILD;	
	}
			
	if($sp1 >= 1){
	echo '<select tabindex="14" title="Inches" name="shoe_size" class="h_select select select_h1 " id="shoe_size">';
			foreach($sp1 as $key => $value){ 
			echo "<option value='".$key. "'>".$value."</option>";
			}			
     echo '</select>';
	}else{echo '<select tabindex="14" title="Inches" name="shoe_size" class="h_select select select_h1 " id="shoe_size">';			
			echo "<option value=''>--Size--</option>";			
     echo '</select>'; exit;}
}
 
 
 /*======Waist size Array=====*/
		$WAIST_SIZE= array(
  '' => '--Select--'
  ,"20" =>"20"
  ,"21" =>"21"
  ,"22" =>"22"
  ,"23" =>"23"
  ,"24" =>"24"
  ,"25" =>"25"
  ,"26" =>"26"
  ,"27" =>"27"
  ,"28"=>"28"
  ,"29"=>"29"
  ,"30"=>"30"
  ,"31" =>"31"
  ,"32" =>"32"
  ,"33" =>"33"
  ,"34" =>"34"
  ,"35" =>"35"
  ,"36" =>"36"
  ,"37" =>"37"
  ,"38" =>"38"
  ,"39"=>"39"
  ,"40"=>"40"
  ,"41"=>"41"
  ,"42"=>"42"
  ,"43"=>"43"
  ,"44"=>"44"
  ,"45"=>"45"
  ,"46"=>"46"
 ); 

 /*======Hip size Array=====*/
		$HIP_SIZE= array(
  '' => '--Select--'
  ,"26" =>"26"
  ,"27" =>"27"
  ,"28" =>"28"
  ,"29" =>"29"
  ,"30" =>"30"
  ,"31" =>"31"
  ,"32" =>"32"
  ,"33" =>"33"
  ,"34"=>"34"
  ,"35"=>"35"
  ,"36"=>"36"
  ,"37" =>"37"
  ,"38" =>"38"
  ,"39" =>"39"
  ,"40" =>"40"
  ,"41" =>"41"
  ,"42" =>"42"
  ,"43" =>"43"
  ,"44" =>"44"
  ,"45"=>"45"
  ,"46"=>"46"
  ,"47"=>"47"
  ,"48"=>"48"
  ,"49" =>"49"
  ,"50" =>"50"
  ,"51" =>"51"
  ,"52" =>"52"
  ,"53" =>"53"
  ,"54" =>"54"
  ,"55" =>"55"
  ,"56" =>"56"
  
 ); 
 /*======Physique  Array=====*/
		$PHYSIQUE = array(
  "1" =>"Slim"
  ,"2" =>"Slim & Curvy"
  ,"3" =>"Muscular & Thin"
  ,"4" =>"Average"
  ,"5" =>"Plus Size"
 
);
/*======Skin Color  Array=====*/
		$SKIN_COLOR= array(
  '' => '--Select--'
  ,"1" =>"Fair"
  ,"2" =>"Dark"
  ,"3" =>"Wheatish"
  ,"4" =>"Tan"
  ,"5" =>"Freckles & Fair"
  ,"6" =>"Medium"
  
); 

/*======Skin Type  Array=====*/
		$SKIN_TYPE= array(
  '' => '--Select--'
  ,"1" =>"Normal"
  ,"2" =>"Dry"
  ,"3" =>"Oily"
  ,"4" =>"Combination"
    
); 

/*======Hair Color  Array=====*/
		$HAIR_COLOR= array(
  '' => '--Select--'
  ,"1" =>"Black"
  ,"2" =>"Brown"
  ,"3" =>"Blonde"
  ,"4" =>"Salt & Pepper"
  ,"5" =>"White"
  ,"6" =>"Colored hair"
  ,"7" =>"Others"
  
); 	 	

/*======Hair length  Array=====*/
		$HAIR_LENGTH= array(
  '' => '--Select--'
  ,"1" =>"Bald"
  ,"2" =>"Very Short"
  ,"3" =>"Short"
  ,"4" =>"Chin length"
  ,"5" =>"Shoulder length"
  ,"6" =>"Chest length"
  ,"7" =>"Waist length"
  ,"8" =>"Tail bone length"
  ,"9" =>"Thigh length"
  ,"10" =>"Knee length"
  
); 	
/*======Hair Type  Array=====*/
		$HAIR_TYPE = array(
  "1" =>"Straight"
  ,"2" =>"Wavy"
  ,"3" =>"Curly"
  
);
/*======Eye Color  Array=====*/
		$EYE_COLOR= array(
  '' => '--Select--'
  ,"1" =>"Brown"
  ,"2" =>"Black"
  ,"3" =>"Blue"
  ,"4" =>"Hazel"
  ,"5" =>"Green"
    
);

/*======Eye Shape  Array=====*/
		$EYE_SHAPE= array(
  '' => '--Select--'
  ,"1" =>"Standard"
  ,"2" =>"Round"
  ,"3" =>"Almond"
  ,"4" =>"Roundish Almond"
  ,"5" =>"Thin Almond"
  ,"6" =>"Droopy"
  ,"7" =>"Hooded"
  ,"8" =>"Others"
); 	

/*======Nose Type  Array=====*/
		$NOSE_TYPE= array(
  '' => '--Select--'
  ,"1" =>"Standard"
  ,"2" =>"Turned up"
  ,"3" =>"Hawk Shape"
  ,"4" =>"Small"
  ,"5" =>"Small & Round"
  ,"6" =>"Pointed"
  ,"7" =>"Flat from Center"
  ,"8" =>"Flat from Tip"
  ,"9" =>"Others"
  
); 	

/*======Lips Type  Array=====*/
		$LIPS_TYPE= array(
  '' => '--Select--'
  ,"1" =>"Standard"
  ,"2" =>"Thin"
  ,"3" =>"Full"
  ,"4" =>"Uneven"
  ,"5" =>"Drooping"
  ,"6" =>"Flat Upper"
  ,"7" =>"Flat Down"
  ,"8" =>"Oversize Down"
  ,"9" =>"Oversize Upper"
  ,"10" =>"Wrinkled"  
  ,"11" =>"Others"
); 	 

/*=====Cheek Shape  Array=====*/
		$CHEEK_SHAPE= array(
  '' => '--Select--'
  ,"1" =>"Standard"
  ,"2" =>"Flat"
  ,"3" =>"Fleshy"
  ,"4" =>"Tight"
  ,"5" =>"Loose"
  
); 
/*======Ear Type  Array=====*/
		$EAR_TYPE= array(
  '' => '--Select--'
  ,"1" =>"Standard"
  ,"2" =>"Small"
  ,"3" =>"Small and Round"
  ,"4" =>"Small and Flat"
  ,"5" =>"Pointed"
  ,"6" =>"Wing shaped"
   
);
/*=====Piercing on  Array=====*/
		$WRINKLES_ON= array(
  
  "1" =>"Forehead"
  ,"2" =>"Eyes"
  ,"3" =>"Cheeks"
  ,"4" =>"Nose"
  ,"5" =>"Neck"
  ,"6" =>"Others"
  ,"7" =>"Hands"
  ,"8"=>"Stomach"
  
  
); 	 
/*=====Wrinkles on Array=====*/
		$PIERCING_ON= array(

  "1" =>"Top of face"
  ,"2" =>"Eyebrow corner"
  ,"3" =>"Nose"
  ,"4" =>"Under the Nose"
  ,"5" =>"Chin"
  ,"6" =>"Neck"
  ,"7" =>"Bridge"
  ,"8"=>"Ears"
  ,"9"=>"Others"
  
); 	 

/*=====Permanent Tattoo Array=====*/
		$PERMANENT_TATTOO= array(
 
  "1" =>"Forehead"
  ,"2" =>"Behind the Ear"
  ,"3" =>"Chest"
  ,"4" =>"Wrist"
  ,"5" =>"Arm"
  ,"6" =>"Back"
  ,"7" =>"Lower Back"
  ,"8"=>"Ankle"
  ,"9"=>"Feet"
  ,"10"=>"Armband"
  
);

/*=====Setup_actor3 Array=====*/
		$PREFERRED_GENRE= array(
 
  "1" =>"Ads"
  ,"2" =>"Films & TV"
  ,"3" =>"Theatre"
  ,"4" =>"Music Videos"
  ,"5" =>"Print Ads"
  ,"6" =>"Events"
  ,"7" =>"Other"
 
  
);
/*======Chest Size  Array=====*/
		$CHEST_SIZE= array(
  '' => '--Select--'
  ,"34" =>"34"
  ,"35" =>"35"
  ,"36" =>"36"
  ,"37" =>"37"
  ,"38" =>"38"
  ,"39" =>"39"
  ,"40" =>"40"
  ,"41" =>"41"
  ,"42"=>"42"
  ,"43"=>"43"
  ,"44"=>"44"
  ,"45"=>"45"
  ,"46"=>"46"
    
);
/*======Bra Size Array=====*/
		$BRA_SIZE= array(
  '' => '--Select--'
  ,"22" =>"22"
  ,"23" =>"23"
  ,"24" =>"24"
  ,"25" =>"25"
  ,"26" =>"26"
  ,"27" =>"27"
  ,"28" =>"28"
  ,"29" =>"29"
  ,"30"=>"30"
  ,"31"=>"31"
  ,"32"=>"32"
  ,"33"=>"33"
  ,"34"=>"34"
  ,"35"=>"35"
  ,"36"=>"36"
  ,"37"=>"37"
  ,"38"=>"38"
  ,"39"=>"39"
  ,"40"=>"40"
  ,"41"=>"41"
  ,"42"=>"42"
  ,"43"=>"43"
  ,"44"=>"44" 
); 	 	

/*======Bust Size Array=====*/
$BUST_SIZE= array(
  '' => '--Select--'
  ,"1" =>"A"
  ,"2" =>"B"
  ,"3" =>"C"
  ,"4" =>"D"
  ,"5" =>"E"
  ,"6" =>"F"
  ,"7" =>"G"  
);

$DANCING_STYLE= array(
  "1" =>"Solo"
  ,"2" =>"With a partner"
  ,"3" =>"Group"
  ,"4" =>"Group lead"
);

$PREFERRED_PERFORMANCE_PLACE_SINGER= array(
  "1" =>" Studio & playback"
  ,"2" =>"Theatre & musicals"
  ,"3" =>"Private parties"
  ,"4" =>"Clubs & restaurants"
  ,"5" =>"Stage performance"
  ,"6" =>"Talent shows"
  ,"7" =>"Events"
  //,"8" =>"All"
);


/***************Type of voice****************/
$TYPE_OF_VOICE= array(
  "1" =>"Shrill"
  ,"2" =>"Husky"
  ,"3" =>"Childish"
  ,"4" =>"Deep"
  ,"5" =>"Normal"
  ,"6" =>"Baritone"
);
/******************Anchoring Preferences*************/
$ANCHORING_PREFERENCES= array(
  "1" =>"Television shows"
  ,"2" =>"Corporate Events"
  ,"3" =>"Private Events"
  ,"4" =>"Clubs & restaurants"
  ,"5" =>"Stage hosting "
  //,"6" =>"All"
 );
/***************Type of voice select****************/
$TYPE_OF_VOICE_SELECT= array(
 "" =>"-- Select --"
 ,"1"=>"Sweet "
  ,"2" =>"Shrill"
  ,"3" =>"Husky"
  ,"4" =>"Deep"
  ,"5" =>"Normal"
  ,"6" =>"Baritone "
  ,"7" =>"Don't know "
);
/***************Best at****************/
$BEST_AT= array(
  "1" =>"Live show format"
  ,"2" =>"Interview format "
  ,"3" =>"Interview with celebrities format"
  ,"4" =>"Stage Show format"
);
/***********************Preferred Magic***************/
$PREFERRED_MAGIC= array(
 ""=>"-- Select -- "
  ,"1" =>"Illusions"
  ,"2" =>"Stage magic "
  ,"3" =>"Close up magic "
  ,"4" =>"Street magic"
  ,"5" =>"Conjuring"
  ,"6" =>"Mind reading"
  ,"7" =>"Platform magic"
);

/********************Comfortable audience size*********************/
$COMFORTABLE_AUDIENCE_SIZE= array(
 ""=>"-- Select -- "
  ,"1" =>"1-10"
  ,"2" =>"10-25"
  ,"3" =>"25-50 "
  ,"4" =>"50-100"
  ,"5" =>"100-500"
  ,"6" =>"500-2000"
  ,"7" =>"2000 & above"
);


/******************** MUSICIAN ARRAYs *********************/
$PREFERENCES_FOR_INSTRUMENTALIST = array(
									 //""=>"Select One",
									  "1" =>"Weddings"
									  ,"2" =>"Restaurants"
									  ,"3" =>"Private Parties"
									  ,"4" =>"Hotels & Clubs"
									  ,"5" =>"Festivals"
									  ,"6" =>"Studio"
									  ,"7" =>"Theater"
									  ,"8" =>"Other"
									  ,"9" =>"All"
								   );
$RECEIVED_FORMAL_TRAINING = array(
								//""=>"Select One",
								"1" =>"School or academy"
								,"2" =>"Tutor"
							);
$PREFER_PLAYING_MUSIC = array(
							//""=>"Select One",
							"1" =>"Solo"
							,"2" =>"In a group"
							,"3" =>"Both"
						);
$BEST_AT_PLAYING = array(
						//""=>"Select One",
						"1" =>"Originals"
						,"2" =>"Covers"
						,"3" =>"No preference"
				   );
$BPREFER_READING_MUSIC_NOTES = array(
									//""=>"Select One",
									"1" =>"Yes"
									,"2" =>"No"
				  			   );
$PREFERENCES_FOR_BAND = array(
							// ""=>"Select One",
							 "1" =>"Weddings"
							 ,"2" =>"Restaurants"
							 ,"3" =>"Private Parties"
							 ,"4" =>"Hotels & Clubs"
							 ,"5" =>"Festivals"
							 ,"6" =>"Studio"
							 ,"7" =>"Theater"
							 ,"8" =>"Public spaces"
							 ,"9" =>"Other"
							 ,"10" =>"All"
						);


//********* Showreel upload Limit ******************//
$SHOWREEL_UPLOAD_LIMIT_EXP = array(
								1 => array(
									'upload_image_count' => 10,
									'upload_video_count' => 2,
									'upload_audio_count' => 1,
								),
								2 => array(
									'upload_image_count' => 6,
									'upload_video_count' => 2,
									'upload_audio_count' => 0,
								),
								4 => array(
									'upload_image_count' => 10,
									'upload_video_count' => 2,
									'upload_audio_count' => 2,
								),
								5 => array(
									'upload_image_count' => 10,
									'upload_video_count' => 2,
									'upload_audio_count' => 0,
								),
								6 => array(
									'upload_image_count' => 1,
									'upload_video_count' => 2,
									'upload_audio_count' => 2,
								),
								7 => array(
									'upload_image_count' => 6,
									'upload_video_count' => 2,
									'upload_audio_count' => 0,
								),
								8 => array(
									'upload_image_count' => 1,
									'upload_video_count' => 0,
									'upload_audio_count' => 2,
								),
								9 => array(
									'upload_image_count' => 6,
									'upload_video_count' => 1,
									'upload_audio_count' => 2,
								),
							);
							
$SHOWREEL_UPLOAD_LIMIT_FRESHER = array(
									1 => array(
										'upload_image_count' => 6,
										'upload_video_count' => 2,
										'upload_audio_count' => 1,
									),
									2 => array(
										'upload_image_count' => 6,
										'upload_video_count' => 2,
										'upload_audio_count' => 0,
									),
									4 => array(
										'upload_image_count' => 2,
										'upload_video_count' => 1,
										'upload_audio_count' => 1,
									),
									5 => array(
										'upload_image_count' => 6,
										'upload_video_count' => 1, 
										'upload_audio_count' => 0,
									),
									6 => array(
										'upload_image_count' => 1,
										'upload_video_count' => 1, // added 1 by sunil
										'upload_audio_count' => 2,
									),
									7 => array(
										'upload_image_count' => 6,
										'upload_video_count' => 2,
										'upload_audio_count' => 0,
									),
									8 => array(
										'upload_image_count' => 1,
										'upload_video_count' => 0,
										'upload_audio_count' => 2,
									),
									9 => array(
										'upload_image_count' => 6,
										'upload_video_count' => 1, // added 1 by sunil
										'upload_audio_count' => 2,
									),
								);
//********* Showreel upload Limit ******************//
//********* Array for Showreel media percentage count limit ******************//
$SHOWREEL_MEDIA_LIMIT = array( 
								1 => array(	// Actor
									'image' => 1,
									'video' => 1,
									'audio' => 0,
								),
								2 => array(	// Dancer
									'image' => 1,
									'video' => 1,
									'audio' => 0,
								),
								4 => array(	// Event Artists	
									'image' => 1,	// all other
									'video' => 1,
									'audio' => 0,
									'21'	=> array(	// anchor mc
										'image' => 1,
										'video' => 1,
										'audio' => 0,
									),
									'22'	=> array(	// DJ
										'image' => 1,
										'video' => 0,
										'audio' => 1,
									),
									'23'	=> array(	// RJ
										'image' => 1,
										'video' => 0,
										'audio' => 1,
									),
									'24'	=> array(	// VJ
										'image' => 1,
										'video' => 1,
										'audio' => 0,
									),
									'25'	=> array(	// magician
										'image' => 1,
										'video' => 1,
										'audio' => 0,
									),
									'26'	=> array(	// standup comedian
										'image' => 1,
										'video' => 1,
										'audio' => 1,
									),
									'18'	=> array(	// Mimic
										'image' => 1,
										'video' => 1,
										'audio' => 1,
									),
									'56'	=> array(	// puppeteers
										'image' => 1,
										'video' => 1,
										'audio' => 0,
									),
								),
								5 => array(	// Model
									'image' => 3,
									'video' => 0,
									'audio' => 0,
								),
								6 => array(	// Singer
									'image' => 0,
									'video' => 0,
									'audio' => 1,
								),
								7 => array(	// Stunts Artist"
									'image' => 1,
									'video' => 1,
									'audio' => 0,
								),
								8 => array(	// Voice Artist"
									'image' => 0,
									'video' => 0,
									'audio' => 1,
								),
								9 => array(	// Musician
									'image' => 1,	// all
									'video' => 1,
									'audio' => 1,									
								),
							);
//********* Array for Showreel media percentage count  ******************//

?>