
    <table border="0" width="100%" cellspacing="0" cellpadding="0">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE; ?></td>
            <td class="pageHeading" align="right"></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main"><?php include(DIR_WS_LANGUAGES . $language . '/' . FILENAME_MAILINGLIST_CONTENT); ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td style="padding:5px;">
		<FORM METHOD="POST" ACTION="http://www.mailermailer.com/x">
Required fields are marked with <font color="red">*</font> below.<br>

<INPUT TYPE=hidden NAME="owner_id_enc" VALUE="18453,$1$AAoIQ$2y/7M3ddDTytHiOLf.DSR1">
<table border="0" cellpadding="2" cellspacing="2" width="100%"></table>
	<table border="0" cellpadding="5" cellspacing="5" width="100%" class="slick">  	<tr valign="top" >    <td>Email Address   <font color="red">*</font></td>     <td><INPUT TYPE=text NAME=user_email
	VALUE="" SIZE=40 MAXLENGTH=100></td>  </tr>
  	<tr valign="top" >    <td valign="top">First Name   <font color="red">*</font></td>
    <td><INPUT TYPE=text NAME=user_fname
	VALUE="" SIZE=40 MAXLENGTH=100></td>  </tr>  	<tr valign="top" >   <td valign="top">Last Name   <font color="red">*</font></td>
   <td><INPUT TYPE=text NAME=user_lname
	VALUE="" SIZE=40 MAXLENGTH=100></td>  </tr>
    
	<tr valign="top" >
      <td valign="top">Age? <font color="red">*</font></td>
      <td><SELECT SIZE=1 NAME="user_attr1">
          <OPTION VALUE="--" SELECTED>--
          <OPTION VALUE="a" >&lt;21
          <OPTION VALUE="b" >21-29
          <OPTION VALUE="c" >30-39
          <OPTION VALUE="d" >40-49
          <OPTION VALUE="e" >50-59
          <OPTION VALUE="f" >60-69
          <OPTION VALUE="g" >70+
        </SELECT>
      </td>
    </tr>
  	<!--
	<tr valign="top" >    <td valign="top">Address </td>
    <td><INPUT TYPE=TEXT NAME=user_addr1
	VALUE="" SIZE=40 MAXLENGTH=100></td>  </tr>  	<tr valign="top" >    <td valign="top">Address <br>
	<small>(line 2)</small></td>
    <td><INPUT TYPE=TEXT NAME=user_addr2
	VALUE="" SIZE=40 MAXLENGTH=100></td>  </tr>  	<tr valign="top" >   <td valign="top">City </td>
   <td><INPUT TYPE=TEXT NAME="user_city"
	VALUE="" SIZE=40 MAXLENGTH=100></td>  </tr>  	<tr valign="top" >  <td>State/Province  </td>
  <td>
<SELECT SIZE=1 NAME=user_state><OPTION VALUE="--" SELECTED>--
<OPTION VALUE="al" >Alabama
<OPTION VALUE="ak" >Alaska
<OPTION VALUE="az" >Arizona
<OPTION VALUE="ar" >Arkansas
<OPTION VALUE="ca" >California
<OPTION VALUE="co" >Colorado
<OPTION VALUE="ct" >Connecticut
<OPTION VALUE="de" >Delaware
<OPTION VALUE="dc" >District of Columbia
<OPTION VALUE="fl" >Florida
<OPTION VALUE="ga" >Georgia
<OPTION VALUE="hi" >Hawaii
<OPTION VALUE="id" >Idaho
<OPTION VALUE="il" >Illinois
<OPTION VALUE="in" >Indiana
<OPTION VALUE="ia" >Iowa
<OPTION VALUE="ks" >Kansas
<OPTION VALUE="ky" >Kentucky
<OPTION VALUE="la" >Louisiana
<OPTION VALUE="me" >Maine
<OPTION VALUE="md" >Maryland
<OPTION VALUE="ma" >Massachusetts
<OPTION VALUE="mi" >Michigan
<OPTION VALUE="mn" >Minnesota
<OPTION VALUE="ms" >Mississippi
<OPTION VALUE="mo" >Missouri
<OPTION VALUE="mt" >Montana
<OPTION VALUE="ne" >Nebraska
<OPTION VALUE="nv" >Nevada
<OPTION VALUE="nh" >New Hampshire
<OPTION VALUE="nj" >New Jersey
<OPTION VALUE="nm" >New Mexico
<OPTION VALUE="ny" >New York
<OPTION VALUE="nc" >North Carolina
<OPTION VALUE="nd" >North Dakota
<OPTION VALUE="oh" >Ohio
<OPTION VALUE="ok" >Oklahoma
<OPTION VALUE="or" >Oregon
<OPTION VALUE="pa" >Pennsylvania
<OPTION VALUE="ri" >Rhode Island
<OPTION VALUE="sc" >South Carolina
<OPTION VALUE="sd" >South Dakota
<OPTION VALUE="tn" >Tennessee
<OPTION VALUE="tx" >Texas
<OPTION VALUE="ut" >Utah
<OPTION VALUE="vt" >Vermont
<OPTION VALUE="va" >Virginia
<OPTION VALUE="wa" >Washington
<OPTION VALUE="wv" >West Virginia
<OPTION VALUE="wi" >Wisconsin
<OPTION VALUE="wy" >Wyoming
<OPTION VALUE="--">--
<OPTION VALUE="ab" >Alberta
<OPTION VALUE="bc" >British Columbia
<OPTION VALUE="mb" >Manitoba
<OPTION VALUE="nt" >N.W. Territories
<OPTION VALUE="nb" >New Brunswick
<OPTION VALUE="nl" >Newfoundland and Labrador
<OPTION VALUE="ns" >Nova Scotia
<OPTION VALUE="nu" >Nunavet
<OPTION VALUE="on" >Ontario
<OPTION VALUE="pe" >Prince Edward Island
<OPTION VALUE="qc" >Quebec
<OPTION VALUE="sk" >Saskatchewan
<OPTION VALUE="yt" >Yukon<OPTION VALUE="--">--
<OPTION VALUE="Other" >Other --&gt;
</SELECT>
    <INPUT TYPE=TEXT NAME=user_state_other VALUE="" SIZE=20 MAXLENGTH=20>
<br><SMALL>If state not on menu, select "Other" and fill in box.</SMALL>  </td> </tr>  	<tr valign="top" >    <td valign="top">ZIP/Postal Code </td>
    <td><INPUT TYPE=TEXT NAME=user_zip
	VALUE="" SIZE=20 MAXLENGTH=20></td>  </tr>  	<tr valign="top" >  <td valign="top">Country </td>
  <td>
<SELECT SIZE=1 NAME=user_country>
<OPTION VALUE="--" SELECTED>--
<OPTION VALUE="us" >United States
<OPTION VALUE="ca" >Canada
<OPTION VALUE="af" >Afghanistan
<OPTION VALUE="al" >Albania
<OPTION VALUE="dz" >Algeria
<OPTION VALUE="as" >American Samoa
<OPTION VALUE="ad" >Andorra
<OPTION VALUE="ao" >Angola
<OPTION VALUE="ai" >Anguilla
<OPTION VALUE="aq" >Antarctica
<OPTION VALUE="ag" >Antigua and Barbuda
<OPTION VALUE="ar" >Argentina
<OPTION VALUE="am" >Armenia
<OPTION VALUE="aw" >Aruba
<OPTION VALUE="au" >Australia
<OPTION VALUE="at" >Austria
<OPTION VALUE="az" >Azerbaidjan
<OPTION VALUE="bs" >Bahamas
<OPTION VALUE="bh" >Bahrain
<OPTION VALUE="bd" >Bangladesh
<OPTION VALUE="bb" >Barbados
<OPTION VALUE="by" >Belarus
<OPTION VALUE="be" >Belgium
<OPTION VALUE="bz" >Belize
<OPTION VALUE="bj" >Benin
<OPTION VALUE="bm" >Bermuda
<OPTION VALUE="bt" >Bhutan
<OPTION VALUE="bo" >Bolivia
<OPTION VALUE="ba" >Bosnia-Herzegovina
<OPTION VALUE="bw" >Botswana
<OPTION VALUE="bv" >Bouvet Island
<OPTION VALUE="br" >Brazil
<OPTION VALUE="io" >British Indian Ocean Territory
<OPTION VALUE="bn" >Brunei Darussalam
<OPTION VALUE="bg" >Bulgaria
<OPTION VALUE="bf" >Burkina Faso
<OPTION VALUE="bi" >Burundi
<OPTION VALUE="kh" >Cambodia
<OPTION VALUE="cm" >Cameroon
<OPTION VALUE="cv" >Cape Verde
<OPTION VALUE="ky" >Cayman Islands
<OPTION VALUE="cf" >Central African Republic
<OPTION VALUE="td" >Chad
<OPTION VALUE="cl" >Chile
<OPTION VALUE="cn" >China
<OPTION VALUE="cx" >Christmas Island
<OPTION VALUE="cc" >Cocos (Keeling) Islands
<OPTION VALUE="co" >Colombia
<OPTION VALUE="km" >Comoros
<OPTION VALUE="cg" >Congo
<OPTION VALUE="ck" >Cook Islands
<OPTION VALUE="cr" >Costa Rica
<OPTION VALUE="hr" >Croatia
<OPTION VALUE="cu" >Cuba
<OPTION VALUE="cy" >Cyprus
<OPTION VALUE="cz" >Czech Republic
<OPTION VALUE="dk" >Denmark
<OPTION VALUE="dj" >Djibouti
<OPTION VALUE="dm" >Dominica
<OPTION VALUE="do" >Dominican Republic
<OPTION VALUE="tp" >East Timor
<OPTION VALUE="ec" >Ecuador
<OPTION VALUE="eg" >Egypt
<OPTION VALUE="sv" >El Salvador
<OPTION VALUE="gq" >Equatorial Guinea
<OPTION VALUE="er" >Eritrea
<OPTION VALUE="ee" >Estonia
<OPTION VALUE="et" >Ethiopia
<OPTION VALUE="fk" >Falkland Islands
<OPTION VALUE="fo" >Faroe Islands
<OPTION VALUE="fj" >Fiji
<OPTION VALUE="fi" >Finland
<OPTION VALUE="cs" >Former Czechoslovakia
<OPTION VALUE="su" >Former USSR
<OPTION VALUE="fr" >France
<OPTION VALUE="fx" >France (European Territory)
<OPTION VALUE="gf" >French Guyana
<OPTION VALUE="tf" >French Southern Territories
<OPTION VALUE="ga" >Gabon
<OPTION VALUE="gm" >Gambia
<OPTION VALUE="ge" >Georgia
<OPTION VALUE="de" >Germany
<OPTION VALUE="gh" >Ghana
<OPTION VALUE="gi" >Gibraltar
<OPTION VALUE="gb" >Great Britain
<OPTION VALUE="gr" >Greece
<OPTION VALUE="gl" >Greenland
<OPTION VALUE="gd" >Grenada
<OPTION VALUE="gp" >Guadeloupe (French)
<OPTION VALUE="gu" >Guam (USA)
<OPTION VALUE="gt" >Guatemala
<OPTION VALUE="gn" >Guinea
<OPTION VALUE="gw" >Guinea Bissau
<OPTION VALUE="gy" >Guyana
<OPTION VALUE="ht" >Haiti
<OPTION VALUE="hm" >Heard and McDonald Islands
<OPTION VALUE="hn" >Honduras
<OPTION VALUE="hk" >Hong Kong
<OPTION VALUE="hu" >Hungary
<OPTION VALUE="is" >Iceland
<OPTION VALUE="in" >India
<OPTION VALUE="id" >Indonesia
<OPTION VALUE="ir" >Iran
<OPTION VALUE="iq" >Iraq
<OPTION VALUE="ie" >Ireland
<OPTION VALUE="il" >Israel
<OPTION VALUE="it" >Italy
<OPTION VALUE="ci" >Ivory Coast (Cote D'Ivoire)
<OPTION VALUE="jm" >Jamaica
<OPTION VALUE="jp" >Japan
<OPTION VALUE="jo" >Jordan
<OPTION VALUE="kz" >Kazakhstan
<OPTION VALUE="ke" >Kenya
<OPTION VALUE="ki" >Kiribati
<OPTION VALUE="kw" >Kuwait
<OPTION VALUE="kg" >Kyrgyzstan
<OPTION VALUE="la" >Laos
<OPTION VALUE="lv" >Latvia
<OPTION VALUE="lb" >Lebanon
<OPTION VALUE="ls" >Lesotho
<OPTION VALUE="lr" >Liberia
<OPTION VALUE="ly" >Libya
<OPTION VALUE="li" >Liechtenstein
<OPTION VALUE="lt" >Lithuania
<OPTION VALUE="lu" >Luxembourg
<OPTION VALUE="mo" >Macau
<OPTION VALUE="mk" >Macedonia
<OPTION VALUE="mg" >Madagascar
<OPTION VALUE="mw" >Malawi
<OPTION VALUE="my" >Malaysia
<OPTION VALUE="mv" >Maldives
<OPTION VALUE="ml" >Mali
<OPTION VALUE="mt" >Malta
<OPTION VALUE="mh" >Marshall Islands
<OPTION VALUE="mq" >Martinique (French)
<OPTION VALUE="mr" >Mauritania
<OPTION VALUE="mu" >Mauritius
<OPTION VALUE="yt" >Mayotte
<OPTION VALUE="mx" >Mexico
<OPTION VALUE="fm" >Micronesia
<OPTION VALUE="md" >Moldavia
<OPTION VALUE="mc" >Monaco
<OPTION VALUE="mn" >Mongolia
<OPTION VALUE="ms" >Montserrat
<OPTION VALUE="ma" >Morocco
<OPTION VALUE="mz" >Mozambique
<OPTION VALUE="mm" >Myanmar
<OPTION VALUE="na" >Namibia
<OPTION VALUE="nr" >Nauru
<OPTION VALUE="np" >Nepal
<OPTION VALUE="nl" >Netherlands
<OPTION VALUE="an" >Netherlands Antilles
<OPTION VALUE="nt" >Neutral Zone
<OPTION VALUE="nc" >New Caledonia (French)
<OPTION VALUE="nz" >New Zealand
<OPTION VALUE="ni" >Nicaragua
<OPTION VALUE="ne" >Niger
<OPTION VALUE="ng" >Nigeria
<OPTION VALUE="nu" >Niue
<OPTION VALUE="nf" >Norfolk Island
<OPTION VALUE="kp" >North Korea
<OPTION VALUE="mp" >Northern Mariana Islands
<OPTION VALUE="no" >Norway
<OPTION VALUE="om" >Oman
<OPTION VALUE="pk" >Pakistan
<OPTION VALUE="pw" >Palau
<OPTION VALUE="pa" >Panama
<OPTION VALUE="pg" >Papua New Guinea
<OPTION VALUE="py" >Paraguay
<OPTION VALUE="pe" >Peru
<OPTION VALUE="ph" >Philippines
<OPTION VALUE="pn" >Pitcairn Island
<OPTION VALUE="pl" >Poland
<OPTION VALUE="pf" >Polynesia (French)
<OPTION VALUE="pt" >Portugal
<OPTION VALUE="pr" >Puerto Rico
<OPTION VALUE="qa" >Qatar
<OPTION VALUE="re" >Reunion (French)
<OPTION VALUE="ro" >Romania
<OPTION VALUE="ru" >Russian Federation
<OPTION VALUE="rw" >Rwanda
<OPTION VALUE="gs" >S. Georgia &amp; S. Sandwich Isls.
<OPTION VALUE="sh" >Saint Helena
<OPTION VALUE="kn" >Saint Kitts &amp; Nevis Anguilla
<OPTION VALUE="lc" >Saint Lucia
<OPTION VALUE="pm" >Saint Pierre and Miquelon
<OPTION VALUE="st" >Saint Tome and Principe
<OPTION VALUE="vc" >Saint Vincent &amp; Grenadines
<OPTION VALUE="ws" >Samoa
<OPTION VALUE="sm" >San Marino
<OPTION VALUE="sa" >Saudi Arabia
<OPTION VALUE="sn" >Senegal
<OPTION VALUE="sc" >Seychelles
<OPTION VALUE="sl" >Sierra Leone
<OPTION VALUE="sg" >Singapore
<OPTION VALUE="sk" >Slovak Republic
<OPTION VALUE="si" >Slovenia
<OPTION VALUE="sb" >Solomon Islands
<OPTION VALUE="so" >Somalia
<OPTION VALUE="za" >South Africa
<OPTION VALUE="kr" >South Korea
<OPTION VALUE="es" >Spain
<OPTION VALUE="lk" >Sri Lanka
<OPTION VALUE="sd" >Sudan
<OPTION VALUE="sr" >Suriname
<OPTION VALUE="sj" >Svalbard and Jan Mayen Islands
<OPTION VALUE="sz" >Swaziland
<OPTION VALUE="se" >Sweden
<OPTION VALUE="ch" >Switzerland
<OPTION VALUE="sy" >Syria
<OPTION VALUE="tj" >Tadjikistan
<OPTION VALUE="tw" >Taiwan
<OPTION VALUE="tz" >Tanzania
<OPTION VALUE="th" >Thailand
<OPTION VALUE="tg" >Togo
<OPTION VALUE="tk" >Tokelau
<OPTION VALUE="to" >Tonga
<OPTION VALUE="tt" >trinidad and Tobago
<OPTION VALUE="tn" >Tunisia
<OPTION VALUE="tr" >Turkey
<OPTION VALUE="tm" >Turkmenistan
<OPTION VALUE="tc" >Turks and Caicos Islands
<OPTION VALUE="tv" >Tuvalu
<OPTION VALUE="ug" >Uganda
<OPTION VALUE="ua" >Ukraine
<OPTION VALUE="ae" >United Arab Emirates
<OPTION VALUE="uk" >United Kingdom
<OPTION VALUE="uy" >Uruguay
<OPTION VALUE="um" >USA Minor Outlying Islands
<OPTION VALUE="uz" >Uzbekistan
<OPTION VALUE="vu" >Vanuatu
<OPTION VALUE="va" >Vatican City State
<OPTION VALUE="ve" >Venezuela
<OPTION VALUE="vn" >Vietnam
<OPTION VALUE="vg" >Virgin Islands (British)
<OPTION VALUE="vi" >Virgin Islands (USA)
<OPTION VALUE="wf" >Wallis and Futuna Islands
<OPTION VALUE="eh" >Western Sahara
<OPTION VALUE="ye" >Yemen
<OPTION VALUE="yu" >Yugoslavia
<OPTION VALUE="zr" >Zaire
<OPTION VALUE="zm" >Zambia
<OPTION VALUE="zw" >Zimbabwe
</SELECT>
  </td> </tr>  	<tr valign="top" >   <td valign="top">Phone </td>
   <td><INPUT TYPE=TEXT NAME=user_phone
	VALUE="" SIZE=20 MAXLENGTH=20></td>  </tr>  	<tr valign="top" >   <td valign="top">FAX </td>
   <td><INPUT TYPE=TEXT NAME=user_fax
	VALUE="" SIZE=20 MAXLENGTH=20></td>  </tr>
 -->
</table>

    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="slick"></table>
<INPUT TYPE="hidden" NAME="function" VALUE="Subscribe">
 <P>
 <INPUT TYPE=SUBMIT VALUE=" Subscribe ">
 &nbsp;
 <INPUT TYPE=RESET VALUE=" Clear Form ">
</FORM>
</P>
	<P>
This list has a
<a href="http://www.mailermailer.com/x?oid=18453v&amp;function=privacy" target="_blank">privacy
policy</A>.</P>
<P align="justify">* Since our customer base is worldwide, we can not be responsible for your local regulations. If participating in this drawing is illegal in your location for any reason, you are not eligible. To claim a prize, you must provide proof of age. If you are under 21, you are not eligible. International winners will be responsible for shipping charges, national and local taxes and/or duties. </P>	
		</td>
      </tr>
    </table>

