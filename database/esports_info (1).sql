-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 01:54 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esports_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `title`, `content`, `username`, `date`, `user_id`) VALUES
(10, '12321', '32132132', 'lee123', '2023-07-08', 1),
(13, '123213', '21321', 'lee123', '2023-07-08', 1),
(14, '123213', '123213', 'lee123', '2023-07-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_reply`
--

CREATE TABLE `forum_reply` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forum_reply`
--

INSERT INTO `forum_reply` (`id`, `title`, `content`, `username`, `date`, `forum_id`, `user_id`) VALUES
(19, '123213', '213213', 'lee123', '2023-07-08', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `latest` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `type`, `latest`, `img`) VALUES
(72, 'LEC to bring back live audience for Spring Split Finals', 'The LEC is bringing back the live audience for one series, as the competition moves closer to the Spring Split finals.Riot Games posted a press release explaining that they’re confident they can safely organize an event featuring a live audience, although the number of attendees will remain limited. “While we are closely monitoring the ongoing COVID-19 pandemic, we are finally confident that we can ensure a safe environment for our fans to celebrate the Spring 2022 Finals in a one-off event. In order to ensure the highest safety, we are limiting the number of attendees.”', 'league', 'yes', 'League1.jpg'),
(73, 'Riot plans mid-scope updates for both Taliyah and Olaf', 'League of Legends developers have talked about some possible updates to Taliyah and Olaf which should be released in a couple of months. It’s no secret that both Taliyah and Olaf haven’t really been in the meta in recent weeks, let alone months. Both champions have struggled a fair share in season 12 and Riot Games have taken notice of the issue. Much like they did with other champions that fell out of favor such as Janna (who quickly became a staple again) and Ahri, they’re planning to change Taliyah and Olaf a little bit to better fit the current environment.', 'league', 'yes', 'League2.jpg'),
(74, 'Doublelift calls out LCS players who don’t use Champions Queue to practice', 'Former LCS bot laner Doublelift has called out LCS players for not using Champions Queue to the fullest. Champions Queue was introduced this season to mitigate many of the issues that have plagued NA soloqueue for years, such as high ping. In the process, players can earn money for high placements, with Jojopyun of Evil Geniuses winning the first iteration and taking home $12.000. However not everyone has been happy with how players are handling Champions Queue and Doublelift has chimed in with his thoughts, much like Golden Guardian’s support Olleh did a while back.', 'league', 'yes', 'League3.jpg'),
(75, 'TSM miss out on LCS playoffs for first time in franchise history', 'It certainly hasn’t been the split TSM had been hoping for in the LCS, as they’ve now been confirmed to miss out on the playoffs. TSM only had a small chance left to stay in contention for a playoff spot, but missed out due to their loss against 100 Thieves, who looked the stronger team. Things went south very fast for TSM in their match, with individual leads forming for 100 Thieves basically everywhere. Star of the match turned out to be 100 Thieves mid laner Abbedagge, who secured 14 kills and helped his team comfortably past TSM.', 'league', 'yes', 'League4.jpg'),
(76, 'Update: Peter Zhang provides statement following being fired from TSM', 'Former TSM coach Peter Zhang has posted a statement after being fired from TSM following multiple allegations of unethical practices. Peter Zhang was let go from TSM after allegations of conflict of interest and unethical practices surfaced, as TSM explained in a short statement posted on social media. According to a more recent report by Richard Lewis for Dexerto, Peter Zhang was also alleged to engage in some financial irregularities, which included borrowing money from players and working as an agent to some of the Chinese players.', 'league', 'no', 'League5.jpg'),
(77, 'T1 remain undefeated in LCK Spring Split and end up with 18-0 record', 'A sensational finish to the regular season of the LCK, as T1 remains without a single loss with a 18-0 record. T1 had only one more hurdle to overcome to maintain their perfect record, which they faced in the form of DRX. Things went rather slowly in the first match, with both teams playing out an even early game. T1 played methodically and targeted turrets, eventually securing Cloud Soul after winning teamfights, closing things out with a big jungle fight. In the second game Faker locked in Veigar which turned out successful. Despite a more chaotic match, T1 pulled ahead again.', 'league', 'no', 'League6.jpg'),
(78, 'GG Olleh calls out pro players for not grinding Champions Queue', 'Golden Guardians support Olleh has called out fellow pro players for not playing Champions Queue enough. While many players and teams embraced Champions Queue as it was released, calling it a saving grace for American League of Legends, things haven’t really turned out as we’ve expected. Now Golden Guardians’ support Olleh has spoken out about a few of the issues he has with Champions Queue and also vented a lot of his frustrations about the previous split.', 'league', 'no', 'League7.jpg'),
(79, 'Streamer climbs from unranked to Master in League of Legends in one sitting', 'A Brazilian streamer climbed the ranks in League of Legends in one session, shooting all the way from unranked to Master. The challenge was done by Nicklink, a Brazilian League of Legends streamer who started his endeavor on March 11. In the end he ended up grinding over 60 hours before completing the challenge he set out, all while not sleeping. While the challenge for sure wasn’t healthy for him, he did hit the goal he wanted to achieve.', 'league', 'no', 'League8.jpg'),
(80, 'Virtus Pro CS:GO players will compete under name ‘Outsiders’ in ESL Pro League', 'The CS:GO players of Virtus Pro will compete in the ESL Pro League under a different name after ESL prohibits playing under VP name. According to a report by Dexerto the CS:GO players of Virtus Pro will be playing under the name ‘outsiders’ during ESL Pro League Season 15. Virtus Pro was prohibited from participating in the competition by ESL because of their ties to Russia and its government, much like Gambit Esports, but allowed their players to still compete if they’d participate under a different banner, which they decided to do.', 'csgo', 'yes', 'Csgo1.jpg'),
(81, 'Hellraisers decide to suspend operations during war in Ukraine', 'Esports organization Hellraisers has released a statement saying they’ll be suspending operations for the duration of the current war in Ukraine. Both the Hellraisers CS:GO and Dota 2 teams include Russian individuals, leading to the organization making the decision. “Our staff includes people with Russian passports and they are still with Ukrainian colleagues in Ukraine. They are also under the attack of Putin’s army.” […] “The Hellraisers Project can’t keep working in a current situation and will be on hold until the war ends. We don’t know how long it will be.”', 'csgo', 'yes', 'Csgo2.jpg'),
(82, 'ESL decides to ban organizations with Russian ties (but players could still be able to compete)', 'Teams which have ties with the Russian government won’t be able to play in the upcoming season of the ESL Pro League. ESL decided to give a little more insight into their decision, which they made in wake of current events. “In the upcoming ESL Pro League, we made the decision that organizations with apparent ties to the Russian government, including individuals or organizations under alleged or confirmed EU sanctions related to the conflict, will not be allowed to be represented (currently we identified two teams – Virtus.pro and Gambit).”', 'csgo', 'yes', 'Csgo3.jpg'),
(83, 'BLAST to exclude Russian-backed teams from tournaments', 'Organizer BLAST has announced that for the \"foreseeable future\" no Russian-based teams will be allowed to participate in their tournaments. The war in Ukraine increasingly begins to affect the esports industry. Tournament organizer BLAST has officially excluded Russian-based organizations from their tournaments.', 'csgo', 'yes', 'Csgo4.jpg'),
(86, 'simple donating to Ukrainian military in show of solidarity', 'As simple shared on his Instagram, he has donated a significant sum to his home country armed forces in a show of solidarity in the current war. The Ukrainian CS:GO legend Aleksandr “simple” Kostyliev has once again shown his support for his home country in the current war. After delivering an emotional speech during IEM Katowice, he has now shared an Instagram Story with his donations to the Ukrainian military.', 'csgo', 'no', 'Csgo5.jpg'),
(87, 'FaZe win IEM Katowice as they sweep G2 Esports', 'A big victory for FaZe Clan at IEM Katowice, as they win the first big CS:GO trophy of 2022 and prove they’re a roster to be watched. Things didn’t start out great for FaZe, who were once again without Havard “rain” Nygaard due to COVID-19, playing with Justin “jks” Savage instead. G2 Esports dominated Inferno early and when everything seemed all but over as they trailed 2-11, FaZe Clan bounced back to take G2 to overtime. There they completely took over and ended the map with a 19-15 win.', 'csgo', 'no', 'Csgo6.jpg'),
(88, 'Favorites MOUZ NXT convincingly win WePlay Academy League playoffs', 'The WePlay Academy League playoffs concluded this weekend and it was MOUZ NXT that made a statement throughout. MOUZ NXT started off their run in the upper bracket of the playoffs, where they first faced Astralis Talent. The latter made an insane run in the play-in stage of the tournament following groups, qualifying despite ending 2-6 in groups. Astralis Talent did give MOUZ NXT some issues, especially on Nuke (13-16), before succumbing on MIrage (16-12) and Vertigo (16-12). In the other half of the bracket BIG Academy breezed past Spirit Academy despite dropping Dust II.', 'csgo', 'no', 'Csgo7.jpg'),
(89, 'What you need to know about the WePlay Academy League playoffs', 'The WePlay Academy league playoffs are on the horizon, so let’s give you an overview of everything you need to know to start watching. After a group stage which featured 2 groups of 5 teams each, with the best team of each group moving on automatically, which turned out to be BIG Academy in Group A and MOUZ NXT in Group B. The other teams of each group took each other on in a Play-In bracket based on their placement in the group. There, Astralis Talent, who finished last in their group, fought their way into the playoffs after an amazing run. Spirit Academy became the final contestant for the playoffs after beating out VP.Prodigy.', 'csgo', 'no', 'Csgo8.jpg'),
(90, 'PGL announces $500.000 Dota 2 Texas Major', 'A new Dota 2 Major is coming to the United States, says PGL, featuring a $500.000 prize pool. This Dota 2 Major will be the final Major of the Dota Pro Circuit 2021-2022, taking place in Arlington, Texas. The Major itself will take place in the Esports Stadium Arlington, the largest esports facility in the United States. A total of 18 teams will take part in the event and it’ll also be the last opportunity for many of them to get some additional points to secure qualification for The International. The Major itself is to take place from August 4 to August 14.', 'dota', 'yes', 'Dota1.jpg'),
(91, 'After investigation in SEA DPC Qualifier: 10 players, including VtFaded, banned from Valve events', 'Things have taken a big turn following the SEA DPC Open Qualifier, as ten players out of Team Orca and Apex have been banned from Valve events. The SEA DPC League posted a tweet stating they’ve gone ahead and disqualified both Team Orca and Team Apex after evidence of match-fixing surfaced, even going back to the BTS Pro Series. “Update on DPC SEA Disqualifications and Bans: During the recent DPC SEA Qualifiers, evidence shows that Team Orca players used Team Apex accounts to compete on their behalf. This is an unacceptable breach of competitive integrity from both teams.”', 'dota', 'yes', 'Dota2.jpg'),
(92, 'Hellraisers decide to suspend operations during war in Ukraine', 'Esports organization Hellraisers has released a statement saying they’ll be suspending operations for the duration of the current war in Ukraine. Both the Hellraisers CS:GO and Dota 2 teams include Russian individuals, leading to the organization making the decision. “Our staff includes people with Russian passports and they are still with Ukrainian colleagues in Ukraine. They are also under the attack of Putin’s army.” […] “The Hellraisers Project can’t keep working in a current situation and will be on hold until the war ends. We don’t know how long it will be.”', 'dota', 'yes', 'Dota3.jpg'),
(93, 'Virtus.Pro claims to be threatened with disqualification at Gamers Galaxy Dota 2 Invitational', 'In the wake of current events, Virtus.Pro claims to be threatened with disqualification at the Gamers Galaxy Dota 2 Invitational Series. Virtus.Pro released a statement on the matter, saying they were forced to release a public statement on the current situation in Ukraine. “Either your club issues a public statement regarding the situation in Ukraine, or you get dropped from the tournament.” They went as far as threatening to announce that our players have COVID (even though all the tests are negative), only to prevent them from playing. As an alternative they offered us a chance to renounce our tag and jerseys and play without affiliation to any particular club or country.“', 'dota', 'yes', 'Dota4.jpg'),
(94, 'Valve decides to postpone DPC in Eastern Europe', 'As the invasion of Russia in Ukraine continues one, Valve has decided to postpone the Eastern Europe Dota Pro Circuit. Valve has decided to postpone the Eastern Europe Dota Pro Circuit following the recent events in Ukraine. The news itself was posted to Twitter by EPICENTER, who organized the event, saying that the decision was made by Valve ahead of the regional league open qualifiers. “We have been informed by Valve that the DPC Eastern European Spring Tour is postponed indefinitely. We will be back soon with details on the new start dates for open qualifications and the main part of the regional tournament.”', 'dota', 'no', 'Dota5.jpg'),
(95, 'New Dota 2 patch 7.31 includes new hero Primal Beast, jungle changes and Techies rework', 'The newest gameplay update for Dota 2 is finally here and includes some serious changes. Patch 7.31 also brings with it the newest hero Primal Beast joining the roster. Primal Beast is a savage, big and scaly monster that reigns as an apex predator. His abilities circle around growing stronger by traveling and taking damage which it can turn upon the enemy, with his kit containing a dash (Onslaught) and (ranged) stun (Pulverize & Rock Throw).', 'dota', 'no', 'Dota6.jpg'),
(96, 'Next Dota Pro Circuit Major to be hosted in Stockholm by ESL', 'We finally got some more information about the next Dota 2 Major, which will be coming to Stockholm and will be hosted by ESL. The Dota 2 Stockholm Major will be the first LAN event for the Dota Pro Circuit in 2022, with ESL saying the tournament will run from May 12 to May 22 and will play host to 18 teams. Ticket sale will be starting on Thursday, February 17. Sweden was originally bound to host The International 10 before Valve had to move countries due to a combination of local laws surrounding sports and esports and the current COVID-19 pandemic. Now they’ll get their chance at redemption with the first offline Major of the year.', 'dota', 'no', 'Dota7.jpg'),
(97, 'TSM enters Dota 2 by signing Team Undying', 'TSM will enter the Dota 2 space, prepared to debut in 2022 DPC. The well-known esports organization, TSM, is officially entering the Dota 2 scene. TSM officially acquisitioned Team Undying’s roster and will debut the roster under its new banner in the 2022 Dota Pro Circuit Winter Tour Regional Finals.', 'dota', 'no', 'Dota8.jpg'),
(98, 'Have the abilities of the newest VALORANT agent been leaked?', 'According to popular VALORANT twitter account ValorLeaks, the abilities of the newest agent have been leaked. Earlier it became clear that the newest agent would be Turkish and is centered around ‘hunting’ other agents. The new leaks seem to confirm this, as the abilities of the new agent (codenamed BountyHunter) focus on hunting, tracking and taking down enemies through covert tactics.\r\n\r\n', 'val', 'yes', 'Valorant1.jpg'),
(99, 'VALORANT blog teases newest agent', 'We have gotten some information on the newest VALORANT agent, as Riot Games lifts the veil a little in their newest blog. In the State of the Agents blog posted by Riot Games, they talked a little about the upcoming agent. One of the key factors that was discussed was the agent revolving around gathering information, alongside ‘hunting down enemies’. “This next Agent should give you a more…intimate feeling when hunting down enemies. Of course, there is our theme—but the thought of giving away too much frightens me so I’ll leave that out.”', 'val', 'yes', 'Valorant2.jpg'),
(100, 'Team Liquid to replace FunPlus Phoenix at VCT Masters Reykjavik', 'What many people have feared turned into reality, as FunPlus Phoenix is unable to participate at VCT Masters Reykjavik due to the war in Ukraine. Due to the war in Ukraine and the invasion by Russia, many travel restrictions are in place, on top of the COVID-19 regulations. This resulted in FunPlus Phoenix being unable to play at VCT Masters Reykjavik. The team features one player from Ukraine (ANGE1) and two Russian players (Shao and SUYGETSU). Team Liquid, who finished in fourth place, will be taking their spot at the Masters.', 'val', 'yes', 'Valorant3.jpg'),
(101, 'Russian VALORANT players likely can’t compete at VCT Masters', 'According to recent rumors, Russian players might not be able to participate during VCT Masters. Due to the current war in Ukraine, it’s unlikely we’ll be seeing Russian players compete at VCT Masters, as they would possibly be banned from the event. Some of the teams that have qualified for VCT Masters already have some Russian players in their roster, namely FunPlus Phoenix and the recently qualified Fnatic. The latter is rumored to already be in talks with possible substitute players, with BONECOLD being a much mentioned name.', 'val', 'yes', 'Valorant4.jpg'),
(102, 'VALORANT Bug party continues – Astra returns as Cypher breaks the game', 'VALORANT players are currently unable to play as Cypher due to a game-breaking bug. In the meantime, Astra returns to the field. The newest VALORANT update 4.04 has brought with it quite a few issues which Riot Games is currently rushing to resolve. First both Yoru and Astra were removed from the game for quite a while after bugs featuring the agents were discovered. They’re currently playable again after the necessary fixes have been applied. That wasn’t the end of the bugs however, as Cypher is currently disabled.', 'val', 'no', 'Valorant5.jpg'),
(103, 'Rawkus is no longer coaching Sentinels', 'Rawkus took to Twitter last night to announce he’s no longer coaching Sentinels.  The announcement came immediately after Sentinels lost the first map in their NA VCT Challengers One matchup against OpTic 2-13. To make matters even more interesting, Rawkus says he hasn’t been coaching the team for two weeks already.\r\n\r\nUnfortunately for the FaZe player turned Sentinels coach, the only tournament that will go on his resume is VCT Champions, where Sentinels was eliminated in the group stage after losses to FURIA and KRÜ Esports.', 'val', 'no', 'Valorant6.jpg'),
(104, 'EMEA VCT matches and Apex Legends Global Series postponed following situation in Ukraine', 'Due to the current crisis in Ukraine, the EMEA VALORANT Champions Tour and Apex Legends Global Series matches will be postponed. Riot Games announced that they’ll be postponing the third week of matches in the 2022 EMEA VALORANT Champions Tour, due to concerns about the welfare of their community. It’s unclear when these matches will be played. “After careful consideration, we have decided to postpone VCT EMEA Week 3 games. Our community’s welfare is integral to us and at this time, our number one priority is to support the players, casters, staff and fans affected by the escalating crisis in Ukraine.”', 'val', 'no', 'Valorant7.jpg'),
(105, 'VALORANT Champions Tour is returning to Iceland in 2022', 'It’s official, the VALORANT Champions Tour is returning to Iceland! In what has quickly become a match made in heaven, Riot Games announced the first Masters event of 2022 will be held in Reykjavik. The announcement was first made on the Weibo account of VALORANT esports yesterday.\r\n\r\nThe original announcement was made in Mandarin, but thanks to the power of the internet, that was quickly translated into English. VCT Masters 1 will run from April 10th until the 24th.', 'val', 'no', 'Valorant8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `venue` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `title`, `date`, `venue`, `contact`, `description`, `type`, `img`) VALUES
(1, 'League Malaysia Cup', '2023-08-08', 'Online', 'esportsinfo@gmail.com', 'Teams must have exactly 5 players', 'league', 'tour_league1.jpg'),
(3, 'IASI MALAYSIA Qualifier', '2023-03-17', 'Online', 'adrian.hendriks@blaze.inc', 'Format : Single Elimination<br>\r\nParticipants Cap : 16 teams (first come first serve basis)<br>\r\nCommunication channel : Discord', 'dota', 'tour_dota1.png'),
(4, 'Valorant SEA Invitational', '2023-10-20', 'Online', 'esportsinfo@gmail.com', 'Round of 64 to 16 (Online): 20 October 2023<br>\r\nRound of 8 to 4 (Online): 21 October 2023<br>\r\nFinals (Online): 24 October 2023', 'val', 'tour_valorant1.jpg'),
(6, 'CSGO The Spirit of Asia', '2023-07-30', 'Online', 'esportsinfo@gmail.com', 'Format : Single Elimination<br>\r\nServer : FaceIT<br>\r\nParticipants Cap : 16 teams (first come first serve basis)<br>\r\nCommunication channel : Discord', 'csgo', 'tour_csgo1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tour_apply`
--

CREATE TABLE `tour_apply` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `tour_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `p1_name` varchar(255) NOT NULL,
  `p2_name` varchar(255) NOT NULL,
  `p3_name` varchar(255) NOT NULL,
  `p4_name` varchar(255) NOT NULL,
  `p5_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_apply`
--

INSERT INTO `tour_apply` (`id`, `name`, `username`, `type`, `tour_name`, `tour_id`, `email`, `contact`, `team_name`, `p1_name`, `p2_name`, `p3_name`, `p4_name`, `p5_name`) VALUES
(2, 'Lee Chee Kwong', 'lee123', 'league', 'League Malaysia Cup', 1, 'abc@gmail.com', '012-3456789', 'ABC Team', 'Ali', 'Abu', 'Abc', 'Amei', 'Alu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'lee123', '12345@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_reply`
--
ALTER TABLE `forum_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_apply`
--
ALTER TABLE `tour_apply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forum_reply`
--
ALTER TABLE `forum_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tour_apply`
--
ALTER TABLE `tour_apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
