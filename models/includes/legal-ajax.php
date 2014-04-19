<?php
  $sPageTitle = 'Terms of Service - BNETDocs';
  $sPageAdditionalStyle = BNETDocs::fGetCurrentFullURL('/legal_page.css', true);
  $oContext->fSetResponseHeader('X-Page-Title', $sPageTitle);
  $oContext->fSetResponseHeader('X-Page-Extra-Style', $sPageAdditionalStyle);
  
  $sPublisherName = Email::$oBNETDocsRecipient->fGetName();
  $sPublishedDate = date('D, M jS, Y g:i:s A T', filemtime(__FILE__));
  
  echo "        <article>\n";
  echo "          <h1>Terms of Service</h1>\n";
  echo "          <section>\n";
  echo "            <p>We run a service called <a href=\"" . BNETDocs::fGetCurrentFullURL('/', true) . "\">BNETDocs</a> and would love for you to use it. Our service is free. Be responsible in what you contribute. In particular, make sure that none of the prohibited items listed below appear on your contributions or get linked to or from your site (things like spam, viruses, hate content, porn, etc.). Please make sure you read through the list and the rest of the terms and agree with them before you get started.</p>\n";
  echo "            <p>The following terms and conditions govern all use of the BNETDocs website and all content, services and products available at or through the website, including, but not limited to, the documentation, services, hosting, and so forth (taken together, the Domain). The Domain is owned (with above applicable exclusions) and operated by Carl Bennett (hereafter \"Carl\"). The Domain is offered subject to your acceptance without modification of all of the terms and conditions contained herein and all other operating rules, policies and procedures that may be published from time to time on this Site by Carl (collectively, the Terms of Service (\"TOS\")).</p>\n";
  echo "            <p>Please read the TOS carefully before accessing or using the Domain. By accessing or using any part of the website, you agree to become bound by the terms and conditions of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. If these terms and conditions are considered an offer by Carl or anyone else, acceptance is expressively limited to these terms.</p>\n";
  echo "            <ol>\n";
  echo "              <li><strong>Your BNETDocs account.</strong> If you contribute content to BNETDocs, you are responsible for maintaining the security of your account, and you are fully responsible for all activities that occur under the account and any other actions taken in connection with the site. You must not contribute content in a misleading or unlawful manner, including in a manner intended to impersonate the name or reputation of others, and Carl may change or remove any content that it considers inappropriate or unlawful, or otherwise likely to cause Carl liability. You must immediately notify Carl of any unauthorized uses of your account or any other breaches of security. Carl will not be liable for any acts or omissions by you, including any damages of any kind incurred as a result of such acts or omissions.</li>\n";
  echo "              <li>\n";
  echo "                <strong>Responsibility of Contributors.</strong> If you post any sort of data on the Domain, or otherwise make (or allow any third party to make) material available by means of the Domain (any such material, also known as \"Data\"), you are entirely responsible for the content of, and any harm resulting from, that Data. That is the case regardless of whether the Content in question constitutes links, text, graphics, an audio file, or computer software. By making the Data available, you represent and warrant that:<br/>\n";
  echo "                <ul>\n";
  echo "                  <li>the downloading, copying and use of the Data will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark or trade secret rights, of any third party;</li>\n";
  echo "                  <li>if your employer has rights to intellectual property you create or contribute, you have either (i) received permission from your employer to post or make available the Data, including but not limited to any software, or (ii) secured from your employer a waiver as to all rights in or to the Data;</li>\n";
  echo "                  <li>you have fully complied with any third-party licenses relating to the Data, and have done all things necessary to successfully pass through to end users any required terms;</li>\n";
  echo "                  <li>the Data does not contain or install or link to any viruses, worms, malware, Trojan horses or other harmful or destructive content;</li>\n";
  echo "                  <li class=\"important\">the Data does not contain or install or link to any software which enables one to cheat in games,
or flood channels, or spam, or anything else determined to be a violation of Blizzard's TOS.</li>\n";
  echo "                  <li>the Data is not spam, and does not contain unethical or unwanted commercial content designed to drive traffic to third party sites or boost the search engine rankings of third party sites, or to further unlawful acts (such as phishing) or mislead recipients as to the source of the material (such as spoofing);</li>\n";
  echo "                  <li>the Data is not obscene, libelous, hateful or racially or ethnically objectionable, and does not violate the privacy or publicity rights of any third party; and</li>\n";
  echo "                  <li>you have, in the case of Data that includes computer code, accurately categorized and/or described the type, nature, uses and effects of the materials, whether requested to do so by Carl or otherwise.</li>\n";
  echo "                </ul>\n";
  echo "                By submitting Data to Carl for inclusion on BNETDocs, you grant Carl a global, royalty-free, and non-exclusive license to reproduce, modify, adapt and publish the Data solely for the purpose of displaying, distributing and promoting the Domain and Carl. If you delete Data, Carl will use reasonable efforts to remove it from the Website as seen neccessary, but you acknowledge that caching or references to the Data may not be made immediately unavailable.<br/><br/>\n";
  echo "                Without limiting any of those representations or warranties, Carl has the right (though not the obligation) to, at Carl's sole discretion: (i) deny or remove any data that, in Carl's reasonable opinion, violates any Carl policy or is in any way harmful or objectionable, or (ii) terminate or deny access to and use of the Domain to any individual or entity for any reason, in Carl's sole discretion. Carl will have no obligation to provide compensation of any sort.<br/>\n";
  echo "              </li>\n";
  echo "              <li><strong>Responsibility of Domain Visitors.</strong> Carl has not reviewed, and cannot review, all of the material, including computer software, posted to the Website, and cannot therefore be responsible for that material's content, use or effects. By operating the Domain, Carl does not represent or imply that it endorses the material there posted, or that it believes such material to be accurate, useful or non-harmful. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, and other harmful or destructive content. The Domain may contain content that is offensive, indecent, or otherwise objectionable, as well as content containing technical inaccuracies, typographical mistakes, and other errors. The Website may also contain material that violates the privacy or publicity rights, or infringes the intellectual property and other proprietary rights, of third parties, or the downloading, copying or use of which is subject to additional terms and conditions, stated or unstated. Carl disclaims any responsibility for any harm resulting from the use by visitors of the Domain, or from any downloading by those visitors of Data posted. If any inappropriate Data is reported, we are not obiligated to, but however will endeavor to do our best to take action on the offending Data.</li>\n";
  echo "              <li><strong>Content Posted on Other Websites.</strong> We have not reviewed, and cannot review, all of the material, including computer software, made available through the websites and webpages to which BNETDocs links, and that link to BNETDocs. Carl does not have any control over those non-Carl websites and webpages, and is not responsible for their contents or their use. By linking to a non-Carl website or webpage, Carl does not represent or imply that it endorses such website or webpage. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, and other harmful or destructive content. Carl disclaims any responsibility for any harm resulting from your use of non-Carl websites and webpages.</li>\n";
  echo "              <li><strong>Copyright Infringement and DMCA Policy.</strong> As Carl asks others to respect its intellectual property rights, it respects the intellectual property rights of others. If you believe that material located on or linked to by BNETDocs violates your copyright, you are encouraged to notify Carl in accordance with Digital Millennium Copyright Act (\"DMCA\"). Carl will respond to all such notices, including as required or appropriate by removing the infringing material or disabling all links to the infringing material. In the case of a visitor who may infringe or repeatedly infringes the copyrights or other intellectual property rights of Carl or others, Carl may, in its discretion, terminate or deny access to and use of the Website. In the case of such termination, Carl will have no obligation to provide a compensation of any sort.</li>\n";
  echo "              <li><strong>Intellectual Property.</strong> The TOS does not transfer from Carl to you any Carl or third party intellectual property, and all right, title and interest in and to such property will remain (as between the parties) solely with Carl. Carl, BNETDocs, and all other service marks, graphics and logos used in connection with Carl, BNETDocs, or the Domain are copyrighted to Carl. Other trademarks, service marks, graphics and logos used in connection with the Carl may be the trademarks of other third parties. Your use of the Domain grants you no right or license to reproduce or otherwise use any Carl or third-party trademarks.</li>\n";
  echo "              <li><strong>Changes.</strong> Carl reserves the right, at its sole discretion, to modify or replace any part of the TOS. It is your responsibility to check the TOS periodically for changes. Your continued use of or access to the Domain following the posting of any changes to the TOS constitutes acceptance of those changes. Carl may also, in the future, offer new services and/or features through the Carl (including, the release of new tools and resources). Such new features and/or services shall be subject to the terms and conditions of the TOS.</li>\n";
  echo "              <li><strong>Termination.</strong> Carl may terminate your access to all or any part of the Domain at any time, with or without cause, with or without notice, effective immediately. If you wish to terminate this agreement with our TOS, or your Carl account (if you have one), your BNETDocs (if you have one), you may simply discontinue accessing the Domain. All contributions upon termination automatically become the property of Carl. Notwithstanding the foregoing, if you have a BNETDocs account, such account can only be terminated by Carl if you contact an administrator. All provisions of the TOS which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</li>\n";
  echo "              <li class=\"important\"><strong>Disclaimer of Warranties.</strong> The Website is provided \"as is\". Carl and its suppliers and licensors hereby disclaim all warranties of any kind, express or implied, including, without limitation, the warranties of merchantability, fitness for a particular purpose and non-infringement. Neither Carl nor its suppliers and licensors, makes any warranty that the Website will be error free or that access thereto will be continuous or uninterrupted. You understand that you download from, or otherwise obtain content or services through, the Domain at your own discretion and risk.</li>\n";
  echo "              <li class=\"important\"><strong>Limitation of Liability.</strong> In no event will Carl, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract, negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement or substitute products or services; (iii) for interruption of use or loss or corruption of data. Carl shall have no liability for any failure or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law.</li>\n";
  echo "              <li><strong>General Representation and Warranty.</strong> You represent and warrant that (i) your use of the Domain will be in strict accordance with the Carl TOS and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United States or the country in which you reside) and (ii) your use of the Domain will not infringe or misappropriate the intellectual property rights of any third party.</li>\n";
  echo "              <li><strong>Indemnification.</strong> You agree to indemnify and hold unliable Carl, its contractors, and its licensors, and their respective directors, officers, employees and agents from and against any and all claims and expenses, related or unrelated, including attorneys' fees, arising out of your use of the Domain, including but not limited to out of your violation of the TOS.</li>\n";
  echo "              <li><strong>Miscellaneous.</strong> The TOS constitutes the entire agreement between Carl and you concerning the subject matter hereof, and they may only be modified by a written amendment signed by an authorized executive of Carl, or by the posting by Carl of a revised version. Except to the extent applicable law, if any, provides otherwise, the TOS, any access to or use of the Domain will be governed by the laws of the state of Texas, U.S.A., excluding its conflict of law provisions, and the proper venue for any disputes arising out of or relating to any of the same will be the state and federal courts located in Alameda Country, California. Except for claims for injunctive or equitable relief or claims regarding intellectual property rights (which may be brought in any competent court without the posting of a bond), any dispute arising under the TOS shall be finally settled in accordance with the Comprehensive Arbitration Rules of the Judicial Arbitration and Mediation Service, Inc. (\"JAMS\") by three arbitrators appointed in accordance with such Rules. The arbitration shall take place in Fremont, California, in the English language and the arbitral decision may be enforced in any court. The prevailing party in any action or proceeding to enforce the TOS shall be entitled to costs and attorneys' fees, as well as compensatory damages. If any part of this Agreement is held invalid or unenforceable, that part will be construed to reflect the parties' original intent, and the remaining portions will remain in full force and effect. A waiver by either party of any term or condition of the TOS or any breach thereof, in any one instance, will not waive such term or condition or any subsequent breach thereof. You may assign your rights under the TOS to any party that consents to, and agrees to be bound by, its terms and conditions; Carl may assign its rights under the TOS without condition. The TOS will be binding upon and will inure to the benefit of the parties, their successors and permitted assigns.</li>\n";
  echo "            </ol>\n";
  echo "          </section>\n";
  echo "          <footer>\n";
  echo "            <div class=\"left\">" . $sPublisherName . "</div>\n";
  echo "            <div class=\"right\">" . $sPublishedDate . "</div>\n";
  echo "          </footer>\n";
  echo "        </article>\n";
  echo "        <article>\n";
  echo "          <h1>Additional Disclaimers</h1>\n";
  echo "          <section>\n";
  echo "            <p>Blizzard and including but not limited to any other affiliated/non-affiliated parties will not be held liable for any trademarked content on this website or for any of the non-trademarked content. These unliable parties are extended to the Internet Service Provider (hereafter \"ISP\"). Please also keep in mind that while this site contains information that may or may not pertain to reverse-engineering, reverse-engineering has been deemed by Blizzard to be a violation of their TOS.</p>\n";
  echo "            <p>We reserve the right to change this legal disclaimer without notice. By choosing to continue to visit this site, you thereby release us from any further obligations, liabilities, and so forth.</p>\n";
  echo "          </section>\n";
  echo "          <footer>\n";
  echo "            <div class=\"left\">" . $sPublisherName . "</div>\n";
  echo "            <div class=\"right\">" . $sPublishedDate . "</div>\n";
  echo "          </footer>\n";
  echo "        </article>\n";
  echo "        <article>\n";
  echo "          <h1>Copyrights</h1>\n";
  echo "          <section>\n";
  echo "            <p><strong><a href=\"http://battle.net\">Battle.net&#174;</a></strong><br/>&#169;1996 - 2014 Blizzard Entertainment, Inc. All rights reserved. Battle.net and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/legacy/\">Blackthorne&#8482;</a></strong><br/>&#169;Blizzard Entertainment, Inc. All rights reserved. Blackthorne is a trademark, and Blizzard Entertainment is a trademark or registered trademark of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com\">Blizzard Entertainment&#174;</a></strong><br/>Blizzard Entertainment is a trademark or registered trademark of Blizzard Entertainment, Inc. in the U.S. and/or other countries. All rights reserved.</p>\n";
  echo "            <p><strong>Blizzard North&#8482;</strong><br/>Blizzard North is a trademark of Blizzard Entertainment, Inc. in the U.S. and/or other countries. All rights reserved.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/legacy/\">Diablo&#174;</a></strong><br/>&#169;1996 Blizzard Entertainment, Inc. All rights reserved. Diablo and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/d2/\">Diablo&#174; II</a></strong><br/>&#169;2000 Blizzard Entertainment, Inc. All rights reserved. Diablo and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/d2/\">Diablo&#174; II: Lord of Destruction&#8482;</a></strong><br/>&#169;2001 Blizzard Entertainment, Inc. All rights reserved. Lord of Destruction is a trademark, and Diablo and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/d3/\">Diablo&#174; III</a></strong><br/>&#169;2012 Blizzard Entertainment, Inc. All rights reserved. Diablo and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://battle.net/d3/reaper-of-souls/\">Diablo&#174; III: Reaper of Souls&#8482;</a></strong><br/>&#169;2014 Blizzard Entertainment, Inc. All rights reserved. Reaper of Souls is a trademark, and Diablo and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/legacy/\">Rock-N-Roll Racing&#8482;</a></strong><br/>&#169;Blizzard Entertainment, Inc. All rights reserved. Rock-N-Roll Racing is a trademark, and Blizzard Entertainment is a trademark or registered trademark of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/sc/\">StarCraft&#174;</a></strong><br/>&#169;1998 Blizzard Entertainment, Inc. All rights reserved. StarCraft is a trademark, and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/sc/\">StarCraft&#174;: Brood War&#8482;</a></strong><br/>&#169;1998 Blizzard Entertainment, Inc. All rights reserved. StarCraft is a trademark, and Brood War and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong>StarCraft&#174;: Ghost&#8482;</strong><br/>&#169;2002 Blizzard Entertainment, Inc. All rights reserved. StarCraft is a trademark, and Ghost and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/sc2/\">StarCraft&#174; II: Wings of Liberty&#8482;</a></strong><br/>&#169;2010 Blizzard Entertainment, Inc. All rights reserved. Wings of Liberty is a trademark, and StarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/sc2/\">StarCraft&#174; II: Heart of the Swarm&#8482;</a></strong><br/>&#169;2013 Blizzard Entertainment, Inc. All rights reserved. Heart of the Swarm is a trademark, and StarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/legacy/\">The Lost Vikings&#8482;</a></strong><br/>&#169;Blizzard Entertainment, Inc. All rights reserved. The Lost Vikings is a trademark, and Blizzard Entertainment is a trademark or registered trademark of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/legacy/\">WarCraft&#174;: Orcs &amp; Humans&#8482;</a></strong><br/>&#169;1994 Blizzard Entertainment, Inc. All rights reserved. Orcs &amp; Humans is a trademark, and WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/legacy/\">WarCraft&#174; II: Beyond the Dark Portal&#8482;</a></strong><br/>&#169;1996 Blizzard Entertainment, Inc. All rights reserved. Beyond the Dark Portal is a trademark, and WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/legacy/\">WarCraft&#174; II: Tides of Darkness&#8482;</a></strong><br/>&#169;1995 Blizzard Entertainment, Inc. All rights reserved. Tides of Darkness is a trademark, and WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/war3/\">WarCraft&#174; III: Reign of Chaos&#8482;</a></strong><br/>&#169;2002 Blizzard Entertainment, Inc. All rights reserved. Reign of Chaos is a trademark, and WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/war3/\">WarCraft&#174; III: The Frozen Throne&#8482;</a></strong><br/>&#169;2003 Blizzard Entertainment, Inc. All rights reserved. The Frozen Throne is a trademark, and WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/wow/\">World of WarCraft&#8482;</a></strong><br/>&#169;2004 Blizzard Entertainment, Inc. All rights reserved. World of WarCraft is a trademark, and WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/burningcrusade/\">World of WarCraft&#8482;: The Burning Crusade&#8482;</a></strong><br/>&#169;2007 Blizzard Entertainment, Inc. All rights reserved. The Burning Crusade is a trademark, and World of WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/wrath/\">World of WarCraft&#8482;: Wrath of the Lich King&#8482;</a></strong><br/>&#169;2008 Blizzard Entertainment, Inc. All rights reserved. Wrath of the Lich King is a trademark, and World of WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/cataclysm/\">World of WarCraft&#8482;: Cataclysm&#8482;</a></strong><br/>&#169;2010 Blizzard Entertainment, Inc. All rights reserved. Cataclysm is a trademark, and World of WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://blizzard.com/games/mists/\">World of WarCraft&#8482;: Mists of Pandaria&#8482;</a></strong><br/>&#169;2012 Blizzard Entertainment, Inc. All rights reserved. Mists of Pandaria is a trademark, and World of WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://battle.net/wow/warlords-of-draenor/\">World of WarCraft&#8482;: Warlords of Draenor&#8482;</a></strong><br/>&#169;Blizzard Entertainment, Inc. All rights reserved. Warlords of Draenor is a trademark, and World of WarCraft and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://battle.net/hearthstone/\">Hearthstone&#174;: Heroes of Warcraft&#8482;</a></strong><br/>&#169;2014 Blizzard Entertainment, Inc. All rights reserved. Heroes of Warcraft is a trademark, and Hearthstone and Blizzard Entertainment are trademarks or registered trademarks of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://heroesofthestorm.com\">Heroes of the Storm&#174;</a></strong><br/>&#169;2014 Blizzard Entertainment, Inc. All rights reserved. Heroes of the Storm is a trademark, and Blizzard Entertainment is a registered trademark of Blizzard Entertainment, Inc. in the U.S. and/or other countries.</p>\n";
  echo "            <p><strong><a href=\"http://bnetdocs.valhallalegends.com\">BNETDocs&#169;</a></strong><br/>The very first, original BNETDocs site is copyrighted to Arta. All rights reserved.</p>\n";
  echo "            <p><strong><a href=\"http://bnetdocs.org\">BNETDocs&#169;: Redux&#8482;</a></strong><br/>BNETDocs: Redux is copyrighted to Don \"Kyro\" Cullen. All rights reserved.</p>\n";
  echo "            <p><strong><a href=\"http://bnetdocs.org\">BNETDocs&#169;: Phoenix&#8482;</a></strong><br/>BNETDocs: Phoenix is copyrighted to Carl \"Jailout\" Bennett. The source code of BNETDocs: Phoenix is available as open-source to the general public at <a href=\"https://github.com/BNETDocs/bnetdocs-phoenix\">GitHub</a>, and therefore is released under the <a href=\"http://creativecommons.org/licenses/by-nc-sa/4.0/\">CC-BY-NC-SA 4.0</a> international license agreement of Creative Commons.</p>\n";
  echo "            <p><strong>All other trademarks referenced on the site are the properties of their respective owners.</strong></p>\n";
  echo "            <p><a rel=\"license\" href=\"http://creativecommons.org/licenses/by-nc-sa/4.0/\"><img alt=\"Creative Commons License\" style=\"border-width:0\" src=\"" . BNETDocs::fGetCurrentFullURL('/CC-BY-NC-SA-4.0-80x15.png', true) . "\" /></a><br />This work is licensed under a <a rel=\"license\" href=\"http://creativecommons.org/licenses/by-nc-sa/4.0/\">Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International License</a>.</p>\n";
  echo "          </section>\n";
  echo "          <footer>\n";
  echo "            <div class=\"left\">" . $sPublisherName . "</div>\n";
  echo "            <div class=\"right\">" . $sPublishedDate . "</div>\n";
  echo "          </footer>\n";
  echo "        </article>\n";
  