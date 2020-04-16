-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2020 at 09:30 AM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medleaph_pharma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` tinyint(3) UNSIGNED NOT NULL,
  `admin_name` varchar(40) NOT NULL,
  `admin_pass` varchar(40) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_job` varchar(50) NOT NULL,
  `admin_contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_pass`, `admin_image`, `admin_email`, `admin_job`, `admin_contact`) VALUES
(2, 'Muhammad Kashif', 'thekille', '1550472335934-1_rotate.jpg', 'qazi.kashif97@gmail.com', 'Web Developer', '3119941899'),
(3, 'Qazi Ahmad Shah', 'ahmadshahahmadshah', 'ahmad.jpg', 'ahmadshah19811981@gmail.com', 'Founder and CEO', '3369333328'),
(4, 'Muhammad Asif', 'asdasd', 'kafi.jpg', 'asif@gmail.com', 'Area Manager', '3149099353');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `com_id` tinyint(3) UNSIGNED NOT NULL,
  `com_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`com_id`, `com_name`) VALUES
(1, 'Inventor Pharma'),
(2, 'Dolphin Laboratories'),
(3, 'ALM Pharma'),
(4, 'Winthrox Laboratories');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` tinyint(3) UNSIGNED NOT NULL,
  `tel1` varchar(20) NOT NULL,
  `tel2` varchar(20) DEFAULT NULL,
  `tel3` varchar(20) DEFAULT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `gmail1` varchar(255) NOT NULL,
  `gmail2` varchar(255) DEFAULT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `tel1`, `tel2`, `tel3`, `facebook`, `instagram`, `gmail1`, `gmail2`, `Address`) VALUES
(1, '3369333328', '3369599169', '915606483', 'https://www.facebook.com/medleapharma/', '', 'medlea_pharma@yahoo.com', 'medleapharmaceutical@gmail.com', 'House no 2 Swati Phatak Near Gulberg Police station Bara lane Peshawar Cant');

-- --------------------------------------------------------

--
-- Table structure for table `founder`
--

CREATE TABLE `founder` (
  `f_id` tinyint(3) UNSIGNED NOT NULL,
  `f_img` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_position` varchar(255) NOT NULL,
  `f_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `founder`
--

INSERT INTO `founder` (`f_id`, `f_img`, `f_name`, `f_position`, `f_message`) VALUES
(1, 'ahmad.jpg', 'Qazi Ahmad Shah', 'Founder And CEO', 'Better health is a basic human right. I founded this company on the vision that everyone poor or rich will receive efficient and better medicine at an affordable price. Eventually Medlea Pharmaceuticals gain the trust of its clients with this vision and built a vast network of clients working towards the same cause. I thank everyone of our client for trusting in Medlea Pharmaceutical and supporting this vision with us.');

-- --------------------------------------------------------

--
-- Table structure for table `marquee_lu`
--

CREATE TABLE `marquee_lu` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `news` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marquee_lu`
--

INSERT INTO `marquee_lu` (`id`, `news`) VALUES
(1, 'The website is under development, sorry for any inconviences');

-- --------------------------------------------------------

--
-- Table structure for table `message_objective`
--

CREATE TABLE `message_objective` (
  `mo_id` tinyint(3) UNSIGNED NOT NULL,
  `message` varchar(400) NOT NULL,
  `objective` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_objective`
--

INSERT INTO `message_objective` (`mo_id`, `message`, `objective`) VALUES
(1, 'Improve the health of millions of people each year by making our products available at responsible prices that are sustainable for our business. Distributing and promoting quality medicine that will promote better health and lifestyle. Commit to quality, safety and reliable supply of our products for patients and consumers. Reduce our environment impact as much as possible', 'Be a leading company on how we support employee health, well being and personal development and flourish our business so our quality medicine can reach and help as many people as possible. Adding new and efficient products to our already diverse portfolio so our clients and consumers always find the best and most efficient medicine with us.');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `p_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `p_desc`) VALUES
(13, 'We have a very strict policy against Infiltration so our clients feels safe and secure with us and to ensure that infiltration will never happen to any of our clients'),
(14, 'No Credit. This policy describes that we do business with no credits allowed. Full payment must be paid at the time of purchase. This policy helps to ensures uninterrupted availability of products to our clients. '),
(15, 'All of our products are registered and every product has all of its legal documentation present. We provide only those products which are approved from the government for there efficacy and better quality'),
(16, 'We provide products of well know companies only, which have made the repute of excellent product quality and efficacy in the market.');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(40) NOT NULL,
  `p_desc` varchar(2000) NOT NULL,
  `formulation` varchar(40) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `featured` tinyint(3) UNSIGNED DEFAULT NULL,
  `cat_id` tinyint(3) UNSIGNED NOT NULL,
  `com_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_desc`, `formulation`, `img1`, `img2`, `img3`, `img4`, `featured`, `cat_id`, `com_id`) VALUES
(1, 'Parapals T 10 Tablets', 'Parapals-T has Tramadol & Paracetamol is a useful treatment option for providing multimedia analgesia in patients with moderate to severe pain. It has efficacy in a variety of frequently encountered painful conditions. Its combination also has an advantage of additive analgesic effects with minimized dose. Its well tolerated in patients with moderate to severe pain and its safety in elderly patients, as an alternative to NSAIDS', 'Tramadol Paracetamol', 'New Project (4).jpg', 'IMG_9711.jpg', 'literature.jpg', 'literature 2.jpg', 1, 1, 1),
(2, 'Dolphin 30 Tablets', 'For Premature Ejaculation And Erectile Dysfunction, Dolphin improves the quality of life, memory, mental awareness, mental clarity, reflex reaction times, blood flow to limbs, mobility in old age and enhances neuro-metabolism, cerebral blood circulation, nerve signal transmission. It also helps to relieve erectile dysfunction, frigidity, low sex drive and depression and impotency', 'Tribulus Terrestris Extract', 'pro 4.jpg', 'IMG_9748.jpg', '2020_04_03 4_42 PM Office Lens.jpg', '', 1, 2, 2),
(3, 'Levoin 250mg 10 Tablets', 'Effective in LRTI\'s (CAP & AECB). Its low resistance offers high cure rate. its short course of therapy provides early recovery and once daily dose enhance patient compliance', 'levofloxacin 250mg', 'New Project (5).jpg', 'IMG_9721.jpg', '2020_04_03 4_50 PM Office Lens.jpg', '2020_04_03 4_52 PM Office Lens.jpg', 0, 1, 1),
(4, 'Levoin 500mg 10 Tablets', 'Effective in LRTI\'s (CAP & AECB). Its low resistance offers high cure rate. its short course of therapy provides early recovery and once daily dose enhance patient compliance', 'levofloxacin 500mg', 'New Project (5).jpg', 'IMG_9721.jpg', '2020_04_03 4_50 PM Office Lens.jpg', '2020_04_03 4_52 PM Office Lens.jpg', 1, 1, 1),
(5, 'Esoin 20mg 14 Capsules', 'It is high effective for resolation of NSAID\'s induce GI Symptoms. It also provides effective acid control for longer duration than omeprazole in patients with GERD. Its highly effective for eradication of H.Pylori Infection', 'Esomeprazole 20mg', 'New Project (2).jpg', 'IMG_9718.jpg', '2020_04_03 4_55 PM Office Lens.jpg', '2020_04_03 4_57 PM Office Lens.jpg', 0, 1, 1),
(6, 'Esoin 40mg 14 Capsules', 'It is high effective for resolation of NSAID\'s induce GI Symptoms. It also provides effective acid control for longer duration than omeprazole in patients with GERD. Its highly effective for eradication of H.Pylori Infection', 'Esomeprazole 40mg', 'New Project (2).jpg', 'IMG_9718.jpg', '2020_04_03 4_55 PM Office Lens.jpg', '2020_04_03 4_57 PM Office Lens.jpg', 1, 1, 1),
(7, 'S RONE 10mg 20 Tablets', 'S Rone has been registered as a Hormone replacement therapy (HRT) to counter the negative effects of unopposed oestrogen on the endometrium. It is relatively safe and well tolerated and does not exhibit the androgenic side effects that are common with some other pro-gestins, like medroxyprogeteron', 'Dydrogesterone 10mg', 'New Project (6).jpg', 'IMG_9735.jpg', '2020_04_03 5_00 PM Office Lens (1).jpg', '2020_04_03 5_00 PM Office Lens.jpg', 0, 1, 3),
(8, 'ZOB 150mg 1 Capsule', 'Free from fungal infections. Zob excellent cure rate for fungal infections. It prefered choice for vulvovaginal candidiasis.  it has a broad anti-fungal spectrum with excellent efficacy. ZOB is convenient once only/weekly dosage', 'Fluconazole 150mg', 'New Project.jpg', 'IMG_9750.jpg', '2020_04_03 4_54 PM Office Lens.jpg', '2020_04_03 4_53 PM Office Lens.jpg', 0, 1, 1),
(9, 'Ventzon 1gm IV Injection', 'A safe and effective broad spectrum agent in the treatment of low incidence of adverse events serious pediatric infections. it treats in lower respiratory tract infection, bacterial repticemia, meningitis, acute bacterial otitis media, bone and joint infection, uncomplicated gonorrhea and surgical prophylaxis', 'Ceftriaxone Sodium 1gm', 'New Project (12).jpg', 'IMG_9762.jpg', '2020_04_03 4_49 PM Office Lens.jpg', '2020_04_03 4_48 PM Office Lens.jpg', 0, 1, 1),
(10, 'Monter 10mg 14 Tablets', 'It provides effective Asthma control in Children aged 2-5 years. it improve patients condition, it significantly improves allergic rhinitis. it also reduces the use of corticosteroids', 'Montelukast 10mg', 'New Project (13).jpg', 'IMG_9733.jpg', '2020_04_03 4_41 PM Office Lens.jpg', '2020_04_03 5_02 PM Office Lens.jpg', 0, 1, 1),
(11, 'Invenzol 20mg 14 Capsules', 'An idea choice for the treatment of gastric and duodenal ulcer with faster relief of pain and acidity. its effective in patients resistant to H2 receptor antagonists. it provides longer control on acid secretion. its safe in patients with hepatic and renal insufficiency.  its better patient compliance due to once daily dosage and its available at affordable price', 'Omeprazol 20mg', 'New Project (11).jpg', 'IMG_9758.jpg', '2020_04_03 4_58 PM Office Lens.jpg', '2020_04_03 4_59 PM Office Lens.jpg', 0, 1, 1),
(12, 'Invenzol 40mg 14 Capsules', 'An idea choice for the treatment of gastric and duodenal ulcer with faster relief of pain and acidity. its effective in patients resistant to H2 receptor antagonists. it provides longer control on acid secretion. its safe in patients with hepatic and renal insufficiency.  its better patient compliance due to once daily dosage and its available at affordable price', 'Omeprazol 40mg', 'New Project (11).jpg', 'IMG_9758.jpg', '2020_04_03 4_58 PM Office Lens.jpg', '2020_04_03 4_59 PM Office Lens.jpg', 0, 1, 1),
(13, 'Monty 4mg 14 Sachets', 'Effectively controls Asthma, Proven result in Allergic Rhinitis (Seasonal & Perennial). Proven safety profile in pediatrics. Convenient once daily dosage and with quality with affordability', 'Montelukast Sodium 4mg', 'New Project (14).jpg', 'IMG_9745.jpg', '2020_04_03 4_45 PM Office Lens.jpg', '', 0, 1, 4),
(14, 'Inxime 400mg 5 Capsules', 'It is used to treat a wide variety of bacterial infections. This medication is known as a cephalosporin antibiotic and works by stopping the growth of bacteria.', 'Cefixime 400mg', 'New Project (1).jpg', 'New Project (7).jpg', '', '', 0, 1, 1),
(15, 'Inxime 200mg 5 Capsules', 'It is used to treat a wide variety of bacterial infections. This medication is known as a cephalosporin antibiotic and it works by stopping the growth of bacteria.', 'Cefixime 200mg', 'New Project (7).jpg', 'New Project (7).jpg', 'IMG_9765.jpg', '', 0, 1, 1),
(16, 'Wincip 500mg 10 Tablets', 'It is a fluoroquinolone antibiotic that fights bacteria in the body. It is used to treat different types of bacterial infections, including skin infections, bone and joint infections, respiratory or sinus infections, urinary tract infections, and certain types of diarrhea.', 'Ciprofloxacin 500mg', 'New Project (3).jpg', 'IMG_9727.jpg', '', '', 0, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

CREATE TABLE `product_cat` (
  `cat_id` tinyint(3) UNSIGNED NOT NULL,
  `cat_name` varchar(25) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`cat_id`, `cat_name`, `icon`, `status`) VALUES
(1, 'Pharmaceutical', 'pharma.png', 1),
(2, 'Nutraceutical', 'neutra.png', 1),
(3, 'Cosmeceutical', 'cosma.png', 0),
(4, 'Herbal', 'herbal.png', 0),
(5, 'Consumer', 'consumer.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `slide_text` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `slide_text`) VALUES
(1, 'slider1.jpg', ''),
(2, 'slider2.jpg', 'Quality Medicine For A Better Life'),
(3, 'slider3.jpg', 'A Name You Can Trust');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `t_id` tinyint(3) UNSIGNED NOT NULL,
  `t_img` varchar(255) NOT NULL,
  `t_name` varchar(40) NOT NULL,
  `t_position` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`t_id`, `t_img`, `t_name`, `t_position`) VALUES
(1, 'ahmad.jpg', 'Qazi Ahmad Shah', 'Founder & CEO'),
(2, 'kafi.jpg', 'Muhammad Asif', 'Area Manager'),
(3, 'ishfaq.jpg', 'Muhammad Asfaq', 'Sales Manager'),
(4, 'irfan.jpg', 'Muhammad Irfan', 'Accounting Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `founder`
--
ALTER TABLE `founder`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `marquee_lu`
--
ALTER TABLE `marquee_lu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_objective`
--
ALTER TABLE `message_objective`
  ADD PRIMARY KEY (`mo_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `cat_index` (`cat_id`),
  ADD KEY `com_index` (`com_id`);

--
-- Indexes for table `product_cat`
--
ALTER TABLE `product_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `com_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `founder`
--
ALTER TABLE `founder`
  MODIFY `f_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marquee_lu`
--
ALTER TABLE `marquee_lu`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_objective`
--
ALTER TABLE `message_objective`
  MODIFY `mo_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_cat`
--
ALTER TABLE `product_cat`
  MODIFY `cat_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `t_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_cat` FOREIGN KEY (`cat_id`) REFERENCES `product_cat` (`cat_id`),
  ADD CONSTRAINT `fk_com` FOREIGN KEY (`com_id`) REFERENCES `companies` (`com_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
