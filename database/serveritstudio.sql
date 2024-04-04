-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2024 at 12:11 PM
-- Server version: 10.6.17-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servflzq_serveritstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_form`
--

CREATE TABLE `admission_form` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admission_form`
--

INSERT INTO `admission_form` (`id`, `user_id`, `course_id`, `course_name`, `user_name`, `mobile`, `email`, `status`, `date`) VALUES
(51, 0, 0, 'Graphic Design', 'Md.Robiul Hossain', '01724992557', 'gazirobiul602@gmail.com', 'Pending', '2024-01-06 18:03:59'),
(52, 0, 0, 'Web Development', 'Towsif Haider', '01309092665', 'towsifhaider333@gmail.com', 'Pending', '2024-01-08 21:19:48'),
(53, 0, 0, 'Graphic Design', 'Rajesh Debnath (Bala)', '01318349167', 'Balabhai@gmail.com', 'Pending', '2024-01-09 22:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `campus_des`
--

CREATE TABLE `campus_des` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `campus_des`
--

INSERT INTO `campus_des` (`id`, `title`, `des`, `image`) VALUES
(1, 'Greetings from Our Campus', 'Server IT. Studio is committed to educating students in the ever-changing field of computer technology. Our mission is to provide students with a comprehensive education that provides them with the knowledge and skills they need to succeed in the competitive world of computing. Our knowledgeable instructors use cutting-edge teaching techniques and cutting-edge technology to provide students with a practical, hands-on education in a variety of computer-related domains such as programming, web development, database management, graphics design and more. Join us today to learn about the exciting opportunities available in the world of computer technology.', 'serveritstudio-class_room_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `campus_video`
--

CREATE TABLE `campus_video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `campus_video`
--

INSERT INTO `campus_video` (`id`, `title`, `text`, `image`, `video`) VALUES
(1, 'Watch Campus Life Video Tour', 'Our modern IT training campus offers state-of-the-art facilities and experienced instructors, <br>providing students with a dynamic and immersive learning experience.', 'team-serverit.jpg', 'video.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `icon`) VALUES
(1, 'Basic Computer', '<i class=\"fa-sharp fa-solid fa-desktop\"></i>'),
(2, 'Design and Multimedia', '<i class=\"fa-sharp fa-solid fa-object-group\"></i>'),
(3, 'Web and Software', '<i class=\"fa-solid fa-bug\"></i>'),
(4, 'Programing', '<i class=\"fa-solid fa-code\"></i>'),
(5, 'Digital Marketing', '<i class=\"fa-solid fa-code\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `motivational_title` varchar(255) NOT NULL,
  `motivational_des` text NOT NULL,
  `summary` text NOT NULL,
  `purpose` text NOT NULL,
  `for_whom` text NOT NULL,
  `pre_idea` text NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `admission_title` varchar(255) NOT NULL,
  `admission_box_title` varchar(255) NOT NULL,
  `admission_box_des` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `total_students` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `cat_id`, `image`, `title`, `sub_title`, `motivational_title`, `motivational_des`, `summary`, `purpose`, `for_whom`, `pre_idea`, `instructor_id`, `admission_title`, `admission_box_title`, `admission_box_des`, `price`, `discount_price`, `tags`, `total_students`) VALUES
(1, 3, 'web-development-min.jpg', 'Web Development', 'Everything you need to build fast and beautiful websites with PHP/PHP OOP/MySQL in one bundle', 'Complete PHP/MySQL Course from Zero to Hero', '<p> \r\nTwo popular web development technologies are PHP and MySQL. Both MySQL and PHP are widely used server-side scripting languages. MySQL is one of the most well-liked open-source relational database management systems. By studying these technologies, you get knowledge and skills that are highly valued in the industry.\r\n<br><br>\r\nCost-efficient: PHP and MySQL are open-source technologies that can be downloaded for free and have a large following among their users. As a result, they offer web development at a reasonable price, especially for new businesses or small- to medium-sized businesses with limited resources.\r\n<br><br>\r\nfreedom: When creating websites, PHP provides a lot of flexibility. It may be used to develop a range of websites, from static, simple ones to dynamic ones with lots of features.\r\n<br><br>\r\nDatabase fusion: MySQL is a reliable and powerful database management system. By becoming proficient with MySQL, which is required for many web applications, you can save and retrieve data from databases with efficiency. User registration programs, online marketplaces, content management systems, and other things are all things you can develop.\r\n<br><br>\r\nCommunity and Resources: Because PHP and MySQL have such large and active communities, there are a ton of resources, tutorials, and help available online. There are numerous frameworks, libraries, and tools that can speed up web development and increase productivity in addition to PHP and MySQL.\r\n<br><br>\r\nOpportunities for Employment: Web development skills in PHP and MySQL are in high demand. Many companies and organizations hunt for PHP and MySQL developers to build and maintain their web applications. Studying these technologies can improve your chances of landing a job in the web development sector.\r\n<br><br>\r\nIn the end, learning PHP and MySQL for web development equips you with a wide range of abilities, cost-effective fixes, and career alternatives. So this course will help you achieve your goals.\r\n</p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>								\r\n									<li><i class=\"fas fa-video\"></i> 48 Offline Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>					\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>You have the ability to build dynamic, interactive websites and web applications.</li>\r\n								<li>It is possible to create personalized websites, e-commerce systems, content management systems (CMS), blogs, discussion forums, and other things.</li>\r\n								<li>Backend development jobs may include working with server-side logic, database activities, and fusing them with front-end technologies like HTML, CSS, and JavaScript.</li>\r\n\r\n<li>Because of your proficiency with PHP and MySQL, you can offer freelance web development services. Many consumers and businesses engage PHP developers to create original websites or to add functionality to websites that already exist. By freelancing, you can take on a range of tasks and build your portfolio.</li>\r\n\r\n<li>Using your knowledge of PHP and MySQL, you may develop API endpoints, integrate systems, and simplify data exchange across numerous apps.</li>\r\n							</ul>', '<ul>\r\n								<li>Developers that aspire to become experts in competitive coding and problem solving</li>\r\n								<li>Students majoring in computer science or similar disciplines</li>\r\n\r\n<li>Anyone wanting to learn both the PHP language and how to create web applications</li>\r\n\r\n<li>Programmers at the beginner to intermediate level who are familiar with PHP</li>\r\n\r\n<li>To start working on the freelancing marketplace</li>\r\n						</ul>', '<p>Absolutely no prior knowledge is necessary. This is a 100 percent thorough web development course that will guide you from having no experience to becoming a web developer who can earn money, step by step and without skipping a beat.\r\n</p>', 1, 'Go from Beginner to Expert', 'Enroll the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 12000, 8000, '', 0),
(3, 2, 'graphic-design.jpg', 'Graphic Design', 'Everything you need to build various types of graphical view in one bundle', 'Graphic Design Master Class - Learn GREAT Design', '<p>\r\nAdobe Photoshop and Illustrator are used by professional graphic designers all around the world. Learning these software packages gives you the skills required to work on various design projects and satisfy industry requirements.\r\n<br><br>\r\n\r\nPhotoshop and Illustrator are powerful and flexible tools that let you create a broad variety of designs. Photoshop is mostly used for editing, altering, and producing digital artwork, whereas Illustrator concentrates on vector drawings and creating scalable designs. Mastering both tools increases your design options.\r\n<br><br>\r\nDesigners have precise control over design aspects thanks to Adobe Photoshop and Illustrator. It is possible to edit images, adjust colors, apply filters and effects, create intricate illustrations, and design logos, layouts, and typography. You can materialize your creative ideas with the help of these instruments, which offer a variety of alternatives and possibilities.\r\n<br><br>\r\n\r\nWorking with people is a common component of design endeavors, as are collaboration and compatibility. By understanding Photoshop and Illustrator, you can easily exchange files with other designers, clients, or printing professionals. Since these software programs are generally compatible, people can easily open and edit your designs.\r\n<br><br>\r\nCareer Opportunities: Graphic design knowledge of Adobe Photoshop and Illustrator is highly sought in the creative industry. Businesses, advertising agencies, design studios, and clients seeking freelancers are all in high demand for designers with experience using these technologies. Your prospects of finding employment or freelance work will increase if you become proficient in Photoshop and Illustrator.\r\n</p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>								\r\n									<li><i class=\"fas fa-video\"></i> 48 Offline Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>													\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n<li>Create stunning images, such as illustrations, logos, and digital paintings.</li>\r\n\r\n<li>Make marketing materials, such as banners, graphics for social media, flyers, and brochures.</li>\r\n\r\n<li>To improve and change images, retouch photos, and create composite designs.</li>\r\n\r\n<li>Make branding items including corporate IDs, letterheads, and business cards.</li>\r\n\r\n<li>Work as a freelancer, graphic designer, or for an advertising or marketing company.</li>\r\n\r\n<li>You can express your creativity and give life to your thoughts through visual communication.</li>\r\n\r\n</ul>', '<ul>\r\n<li>Aspiring graphic designers who want to understand the tools of the trade.</li>\r\n\r\n<li>Skilled designers eager to hone their Photoshop and Illustrator talents.</li>\r\n\r\n<li>Digital designers that are passionate about creating graphics, logos, and other visual designs.</li>\r\n\r\n<li>Marketing and advertising professionals that want to create aesthetically appealing content.</li>\r\n\r\n<li>Business owners or entrepreneurs who want to design their own marketing materials.</li>\r\n\r\n<li>Students who want to pursue careers in design, advertising, or related fields.\r\nanyone who enjoys graphic design and wants to learn the techniques and equipment used by professionals in the field.</li>\r\n\r\n</ul>', '<p>No prior knowledge is required to start learning graphic design with Adobe Photoshop and Illustrator. These computer programs are designed to work with users of all skill levels, including beginners. But having a rudimentary grasp of design concepts like color theory and composition can help you create aesthetically pleasing graphics. But even if you\'ve never done graphic design before, you can gradually pick it up through practice, classes, and tutorials.\r\n</p>', 2, 'Go from Beginner to Expert', 'Enroll the Complete Bundle', '<p class=\"wonit\">Own it!</p>\r\n								<p>Limited Time!</p>', 10000, 6000, '', 6),
(4, 1, 'office-management.jpg', 'Microsoft Office Application', 'Microsoft office in one bundle. Make yourself as a Office Program Specialist.', 'Improve the Efficiency of Your Office with Microsoft\'s Leading Office Management Software\r\n', '<p>\r\nIn this day and age, we must utilize Microsoft Office software (Microsoft Word, Excel, or PowerPoint) for our studies or careers. If these three softwares are not adequately mastered, even simple tasks must be performed with the assistance of others. To increase your technical skills, it is critical to understand how to use the three major Microsoft Office software programs - Microsoft Word, PowerPoint, and Excel.\r\n\r\n<br><br>\r\n\r\nNowadays, it is believed that you would have a solid understanding of Microsoft Office. As a student, you must be familiar with Microsoft Word, PowerPoint, and Excel. You can create all the documents you need in your profession and daily life simply by learning how to utilize these three software programs.\r\n <br><br>\r\n\r\nEnroll in the \"Microsoft Office 3 in 1 Bundle\" course right away to take your skills to the next level by learning these three Microsoft Office programs.\r\n\r\n\r\n</p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>								\r\n									<li><i class=\"fas fa-video\"></i> 24 Offline Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>					\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n<li>To get started in the freelance sector, you\'ll need data entry skills.</li>\r\n<li>Data Entry Techniques for Freelance Work without Advanced Technology or IT Knowledge</li>\r\n<li>Learn data input and how to obtain work and payment information.</li>\r\n<li>Learn the professional work of Data Entry quickly and easily using some common applications.</li>\r\n</ul>', '<ul>\r\n<li>\r\nStudents, Teachers or Researchers\r\n</li>\r\n<li>\r\nData Entry Operators\r\n</li>\r\n<li>\r\nContent Writers\r\n</li>\r\n<li>\r\nBusiness or Corporate sector employees\r\n</li>\r\n<li>\r\nAny one who wants to Master the Microsoft Office\r\n</li>\r\n\r\n</ul>\r\n\r\n\r\n', '<p>Everything you need to know from the basics to more advanced concepts are included. We\'ve carefully structured this course so anyone can progress quickly and easily and learn a lot along the way. </p>', 4, 'Go from Beginner to Expert', 'Enroll the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>', 3500, 2500, 'office application, word, powerpoint, excel, basic computer, computer', 20),
(5, 3, 'web-design-min.png', 'Web Design', 'Everything you need to build fast and beautiful websites with HTML,CSS, JavaScript and Bootstrap in one bundle', 'Complete HTML5/CSS3/JavaScript/Bootstrap Course from Zero to Hero', '<p> Have you always wanted to learn web design but didn\'t know where to start? Tired of lengthy, boring and outdated courses? This course is for you. <br /><br />\r\n\r\n								A fun, comprehensive and beginner-friendly course that teaches you all the skills you need to build professional-quality websites with HTML5,CSS3, JavaScript(ES6) and BootStrap. <br /><br />\r\n\r\n								Say goodbye to long, boring, repetitive courses with outdated content that spend too much time on the basics. This is the only HTML5/CSS3/JavaSctipt/BootStrap you\'ll ever need! <br /><br />\r\n\r\n								The first part teaches you the fundamentals, the second part explores advanced concepts and the third part puts everything together to build and deploy a real website. You\'ll start with a code editor and finish with a live website. <br /><br />\r\n\r\n							Whether you\'re an absolute beginner wanting to learn web design from scratch, or you know a bit of HTML5/CSS3 and need a refresher course to fill the gaps, this course will help you achieve your goals. </p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n							\r\n									<li><i class=\"fas fa-video\"></i> 48 Offline Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n								\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Confidently build websites with HTML5/CSS3/JavaScipt(ES6)/Bootstrap </li>\r\n								<li>Build websites that look great on any screen or device </li>\r\n								<li>Troubleshoot issues like a pro</li>\r\n								<li>Deploy your websites to the cloud</li>\r\n							</ul>', '<ul>\r\n								<li>Anyone wanting to become a front-end developer</li>\r\n								<li>Anyone wanting to create websites for fun or to make money</li>\r\n							</ul>', '<p>You may start learning HTML, CSS, and JavaScript for web design without any prior knowledge. Newcomers can start learning these languages and subsequently grow in their ability through beginner-focused materials and courses.\r\n</p>', 1, 'Go from Beginner to Expert', 'Enroll the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 12000, 8000, 'web design,html,css,javascript,bootstrap,jquery,web,design', 0),
(17, 5, 'Digital-Marketing.jpg', 'Digital Marketing', 'Master Digital Marketing Strategy, Social Media Marketing, SEO, Facebook Marketing, Analytics & More!', 'A proficient digital marketer requires knowledge in particular fields.', '<p>\r\n<b>Market Research.</b> Ask 3 simple questions to validate your business idea.\r\n<br>\r\n<b>WordPress.</b> Build a world-class website in 1 hour without any coding.\r\n\r\n<br>\r\n<b>SEO (Search Engine Optimisation).</b> Get free traffic to your website with SEO.\r\n<br>\r\n<b>YouTube Marketing.</b> Drive traffic & sales with simple \"how to\" videos.\r\n<br>\r\n<b>Social Media Marketing (Instagram, Facebook, Twitter, Pinterest & Quora).</b>\r\n<br>\r\n\r\n<b>Facebook Ads.</b> Make money with Facebook Ads without spending a fortune.\r\n<br>\r\nBy the end of this course, you will be confidently implementing marketing strategies across the major online marketing channels.\r\n<br>\r\nAll the strategies, tips, and tools recommended are either free or very cost-effective.\r\n<br><br>\r\n\r\nDon\'t Miss Out!\r\n\r\nEvery second you wait is costing you valuable leads and sales.\r\n\r\nGo ahead and hit the \"take this course\" button to start growing a business online today!\r\n</p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n							\r\n									<li><i class=\"fas fa-video\"></i> 48 Offline Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n								\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Planning & Executing Digital Marketing Campaigns for Businesses.</li>\r\n								<li>Undertake Social Media Marketing</li>\r\n								<li>Create and manage Facebook, Instagram Ad Campaign.</li>\r\n								\r\n<li>Use Google Analytics & Google Tag Manager</li>\r\n\r\n<li>Undertake Technical, On-Page & Off-Page SEO</li>\r\n\r\n							</ul>', '<ul>\r\n								<li>Prelaunch business entrepreneurs that are unsure about where to begin</li>\r\n								<li>Website owners who experience traffic and sales problems</li>\r\n	\r\n<li>Anyone wishing to enhance their resume with very lucrative talents</li>						</ul>', '<p>\r\nBasic familiarity with PCs, MS Windows, the internet, and online usage <br>\r\nbasic proficiency in reading, writing, and speaking English<br>\r\nknowledge of code (HTML, CSS)\r\n</p>', 1, 'Go from Beginner to Expert', 'Enroll the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 9000, 6000, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_queries_form`
--

CREATE TABLE `customer_queries_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `image`) VALUES
(1, 'header-logo', 'header-logo-min.png'),
(2, 'footer-logo', 'header-logo-min.png');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `expertise`, `about`, `image`) VALUES
(1, 'Md Rabiul Hasan', 'Web Developer', 'Co-Founder & Trainer - Web Development', 'raju-min.jpg'),
(2, 'Nibir Hasan', 'Graphic Designer', 'Co-Founder & Trainer - Graphic Design', 'nibir-min.jpg'),
(3, 'Nihaj Hasan', 'Graphic Designer', 'Trainer - Graphic Design', 'nihaj-min.jpg'),
(4, 'Nakib Hasan', 'Microsoft Office', 'Trainer - Office Management', 'nakib-min.jpg'),
(5, 'Saif Haider', 'Web Developer', 'Trainer - Web Development', 'saif-min.jpg'),
(6, 'Towsif Haider', 'Digital Marketing', 'Trainer - Digital Marketing', 'towsif-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `links`) VALUES
(1, 'Home', 'home'),
(2, 'Courses', 'courses'),
(3, 'About', 'about'),
(4, 'Contact', 'contact'),
(5, 'Privacy & Policy', 'privacy'),
(6, 'Account', 'auth'),
(7, 'Admission', 'admission'),
(9, 'Documents', 'documents');

-- --------------------------------------------------------

--
-- Table structure for table `on_slider`
--

CREATE TABLE `on_slider` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `on_slider`
--

INSERT INTO `on_slider` (`id`, `icon`, `title`) VALUES
(1, '<i class=\"fa-sharp fa-solid fa-desktop\"></i>', 'Basic Computer/Microsoft Office'),
(2, '<i class=\"fa-sharp fa-solid fa-object-group\"></i>\r\n', 'Design and Multimedia'),
(3, '<i class=\"fa-solid fa-bug\"></i>', 'Web and Software'),
(4, '<i class=\"fa-solid fa-code\"></i>', 'Programing');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `des`, `image`, `date`, `tags`) VALUES
(2, 'Notice for Class Schedule- Server IT', 'আজকে ৩ টা থেকে গ্রাফিক্সের সেকেন্ড ক্লাস অনুষ্ঠিত হবে... সবাইকে যথাসময়ে উপস্থিত থাকার অনুরোধ করা যাচ্ছে', 'notice.jpg', '2023-04-11 02:52:39', 'server,serverit');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `star_rating` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `name`, `course_name`, `comment`, `star_rating`, `user_id`) VALUES
(2, 'Student - 1', ' Web Development', 'I recently completed a web development course and I must say it was a great learning experience. The course was well-structured and covered all the essential topics required to build modern websites. The instructors were knowledgeable and provided clear explanations, which made it easy to follow along. The course projects and assignments were challenging but fun, and helped me put into practice what I learned. I also appreciated the additional resources provided, such as reference materials and online support. Overall, I highly recommend this web development course to anyone interested in learning how to create websites', '<ul class=\"list-unstyled d-flex justify-content-center text-danger mb-0\">\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li>\r\n                        <i class=\"fas fa-star-half-alt fa-sm\"></i>\r\n                      </li>\r\n                    </ul>', 0),
(3, 'Student - 2', 'Graphics Design', 'If you\'re interested in learning about graphics and design, I highly recommend taking a graphics course. It\'s a great way to gain valuable skills and knowledge that can help you in a variety of industries, including web design, marketing, and advertising.\r\n\r\nThe graphics course I took was comprehensive and covered everything from the basics of design principles to more advanced techniques like color theory, typography, and layout. The instructor was knowledgeable and experienced, and provided plenty of opportunities for hands-on practice and feedback.\r\n\r\nThroughout the course, I was able to work on real-world projects and apply what I learned to create professional-looking designs. I also appreciated the flexibility of being able to work at my own pace and review the material as needed.\r\n\r\nOverall, I found the graphics course to be both informative and enjoyable, and I would definitely recommend it to anyone looking to improve their design skills or pursue a career in graphics.', '<ul class=\"list-unstyled d-flex justify-content-center text-danger mb-0\">\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li><i class=\"fas fa-star fa-sm\"></i></li>\r\n                      <li>\r\n                        <i class=\"fas fa-star-half-alt fa-sm\"></i>\r\n                      </li>\r\n                    </ul>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `button_name` varchar(255) NOT NULL,
  `button_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `title`, `text`, `button_name`, `button_link`) VALUES
(1, 'serveritstudio-main-slider-min.jpg', 'Bringing Your Digital Future to Life.', 'Server IT Studio', 'Sign up today', 'auth/2'),
(6, 'serveritstudio-main-slider-min.jpg', 'Empower Yourself with Industry-Leading Skills at our Premier Training Institute', 'Server IT Studio', 'Browse Courses', 'courses');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `link`, `icon`) VALUES
(1, 'facebook', 'https://www.facebook.com/serverITStudio', '<i class=\"fa-brands fa-facebook-f\"></i>'),
(2, 'instagram', 'https://www.instagram.com/serveritstudio/', '<i class=\"fa-brands fa-instagram\"></i>'),
(3, 'twitter', 'https://twitter.com/serveritstudio', '<i class=\"fa-brands fa-twitter\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'review.png',
  `student_phone` varchar(255) NOT NULL,
  `gaurdian_phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `admission_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `student_id`, `image`, `student_phone`, `gaurdian_phone`, `address`, `course_name`, `course_duration`, `fee`, `paid`, `due`, `date_of_birth`, `admission_date`) VALUES
(1, 'Md. Tofiqul Islam', 'SIT1011', 'FB_Profile.jpg', '', '01821384225', 'Farazi Bazar, Kabirhat, Noakhali', 'Office Application', 'Two Month', 3000, 1500, 1500, '2007-07-27', '2023-06-19'),
(2, 'Aditta  das', 'SIT1012', 'FB_Profile.jpg', '01774754686', '01812863194', 'Pahartoli, Chattorgram', 'Office Application', 'Two Month', 3000, 1500, 1500, '2005-05-20', '2023-06-12'),
(3, 'Sadia Akter\r\n', 'SIT1015', 'FB_Profile.jpg', '', '01919582371\r\n', 'Saraipara, Pahartali, Chattogram', 'Office Application\r\n', 'Two Month\r\n', 3000, 1500, 1500, '2006-09-10', '2023-06-12'),
(4, 'Aiman Samir\r\n', 'SIT1013', 'FB_Profile.jpg', '01791611182\r\n', '01818176719\r\n', 'Saraipara, Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 1500, 1500, '2005-02-14', '2023-06-12'),
(5, 'Aynun Nahan\r\n', 'SIT1014', 'FB_Profile.jpg', '01917018942\r\n', '01856603020\r\n', 'Noapara, Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 3000, 0, '1994-04-17', '2023-06-14'),
(6, 'Rosmiah Akter\r\n', 'SIT1017', 'FB_Profile.jpg', '01566025555\r\n', '01815600311\r\n', 'Noapara, Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 2500, 1000, 1500, '2007-08-21', '2023-06-19'),
(7, 'Arpon Nath\r\n', 'SIT1016', 'FB_Profile.jpg', '', '01829086666\r\n', 'South Kattoli, North Nathpara\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 1500, 1500, '2006-05-08', '2023-06-19'),
(8, 'Nafisa Sultana Rahi\r\n', 'SIT1018', 'FB_Profile.jpg', '', '01825377393\r\n', 'Sagarika Road, Pahartali, Chattogram.\r\n', 'Office Application\r\n', 'Two Month\r\n', 2500, 1000, 1500, '2007-06-26', '2023-06-20'),
(9, 'MD. Zakir Hossen Chowdhury\r\n', 'SIT1019', 'FB_Profile.jpg', '', '01857533877\r\n', 'CDA Market, Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 3000, 0, '2006-08-13', '2023-06-24'),
(10, 'Samin Tarafder', 'SIT1020', 'FB_Profile.jpg', '', '01911706488\r\n', 'Ajuak Mansion, City Gate, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 3000, 0, '2003-08-18', '2023-07-14'),
(11, 'Ismail Hossain Rifat\r\n', 'SIT1021', 'FB_Profile.jpg', '01313340267\r\n', '', 'Relway Workshop Gate, Khulshi, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 1500, 1500, '2000-01-10', '2023-07-15'),
(12, 'Abdur Rahim Munna\r\n', 'SIT1022', 'FB_Profile.jpg', '01744101687\r\n', '01305503601\r\n', '25 No. Rampor word, Halishahar, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 2000, 1000, '2000-10-02', '2023-07-15'),
(13, 'Hasanur Rahim Emon\r\n', 'SIT1023', 'FB_Profile.jpg', '01864989286\r\n', '01834880426\r\n', 'Alongkar, Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 0, 0, 0, '2002-03-17', '2023-07-17'),
(14, 'Eshmamur Rahman Khan\r\n', 'SIT1024', 'FB_Profile.jpg', '01891650212\r\n', '01864119229\r\n', 'Hazi Hanif House , 250/A DT Road, Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 3000, 0, '2005-12-12', '2023-07-15'),
(15, 'Monirul Islam Parves\r\n', 'SIT1025', 'FB_Profile.jpg', '01820821090\r\n', '', 'Romjan Alir Bari, Abdul Ali Market, Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 0, 0, 0, '1996-06-17', '2023-06-22'),
(16, 'Jahangir Alam\r\n', 'SIT1026', 'FB_Profile.jpg', '01711078779\r\n', '', 'Akborsha housing, pahartali, Chattorgram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 3000, 0, '1978-06-09', '2023-07-08'),
(17, 'Kurban Ali Sumon\r\n', 'SIT1027', 'FB_Profile.jpg', '01835125724\r\n', '', 'Akborsha housing, pahartali, Chattorgram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 0, 3000, '1994-07-10', '2023-06-22'),
(18, 'Md Firoz khan shimul\r\n', 'SIT1028', 'FB_Profile.jpg', '01837894096\r\n', '', 'Mousumi R/A. Pahartali, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 2000, 0, 2000, '1994-08-25', '2023-06-22'),
(19, 'Alif Mahmood\r\n', 'SIT1029', 'FB_Profile.jpg', '01632722625\r\n', '', 'Abdul Ali Nagar, Jolapara, Chattogram\r\n', 'Office Application\r\n', 'Two Month\r\n', 3000, 0, 3000, '1998-07-27', '2023-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `top_bar`
--

CREATE TABLE `top_bar` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `top_bar`
--

INSERT INTO `top_bar` (`id`, `address`, `email`, `number`) VALUES
(1, 'A18, Ground Floor, S.M Metro Center, Alonkar Moor, Pahartali Chittagong, Chittagong Division, Bangladesh', 'info@serveritstudio.com', '01945466821,\r\n01834880426');

-- --------------------------------------------------------

--
-- Table structure for table `upcoming_courses`
--

CREATE TABLE `upcoming_courses` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `upcoming_courses`
--

INSERT INTO `upcoming_courses` (`id`, `title`, `des`, `image`, `date`) VALUES
(1, 'Mastering Digital Marketing: Strategies and Techniques for Success', 'This course will provide a comprehensive overview of digital marketing, including the latest trends, tools, and best practices. Participants will learn how to create effective digital marketing campaigns, optimize search engine rankings, build engaging content, and leverage social media platforms to increase brand awareness and drive conversions. Through case studies, practical exercises, and interactive discussions, participants will develop the skills and knowledge needed to succeed in today\'s fast-paced digital landscape. Whether you are a seasoned marketer or just starting out, this course will provide you with the insights and strategies you need to stay ahead of the competition and achieve your marketing goals.', 'digital-marketing.png', '2023-04-11 02:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `date`) VALUES
(6, 'rhr2416@gmail.com', '$2y$10$HAHtwU7vIhteuKiBpQW2x.saN9qW01hNh/DpvaDgeFeCbVHBLRzIK', '2023-04-21 06:42:23'),
(9, 'usenormal775@gmail.com', '$2y$10$uUbZ7CEgMJn11eqjMQrBOetOb.vSHkFejBmbdlIJzP7W2afnkAAMW', '2023-05-18 17:32:50'),
(10, 'towsifhaider333@gmail.com', '$2y$10$7NHyov.lhuXIs96t4hfHBOmmLo/l/rofoDGz6RVmaajljVV45NafC', '2023-05-19 12:43:56'),
(11, 'mdrabiulhasan.cse@gmail.com', '$2y$10$YC3m/CBAjC4fOKWYpM1ZluQ3ZfmxO4QTNgXF9w2yrZl7nJdtgrmYi', '2023-05-21 09:24:59'),
(12, 'jolchaapcs@gmail.com', '$2y$10$vUQoVOFfnA1.ljeUYYDeaOPrK5uqQVEec6ah6x.V/uEPH67kfaOq.', '2023-05-22 10:26:08'),
(13, 'saifhaiider@gmail.com', '$2y$10$.ucS2JQMKSYm1s.7fO6rduvJLGMxBGTtWjGbkLqQ9Ygcti9/abGYW', '2023-05-22 13:55:30'),
(14, 'test@gmail.com', '$2y$10$KMEBK9Y2QKcM8FSGfZxiNuedqlHqPcTPcTtUhRw0KUTnk26eJPlaq', '2023-05-27 16:40:13'),
(27, 'rabiulhasan2416@gmail.com', '$2y$10$WjZODQizzMAZpZ6njYGq/eOnuZdxGWbzz7.52sd6Q7WTN44S9lgyK', '2023-06-10 09:02:53'),
(28, 'serveritstudio@gmail.com', '$2y$10$XvwIAjnSbTcFya54R3gK4ex2UZj0y.D//VjwUfXL9XAz5Ej30Bu0C', '2023-06-10 23:01:10'),
(29, 'mahmudnihaj98@gmail.com', '$2y$10$jCOI5i/v13M.xBDIGojTSOYLC7lGfkXQVtjJdcHqaa9T4l1LlqsMG', '2023-06-13 08:51:12'),
(30, 'tisanim14@gmail.com', '$2y$10$dvvPlGqimY.wl0WkljWmX.7Cf9wuMCEpzuLw51z74XwCAv.ULVATC', '2023-11-13 01:37:56'),
(31, 'tofiqkqzi@gmail.com', '$2y$10$L15Od1hZuyQIg5h5v2.RCOwePqhAHq9lHFE1lwHDGINEQDvZN1h2i', '2023-11-13 01:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `user_id`, `name`, `title`, `address`, `mobile`, `image`) VALUES
(9, 6, 'Md Rabiul Hasan', 'A Full-Stack Web Developer', 'Chittagong, Bangladesh', '01879408425', 'profile-image-9472431687372222.png'),
(12, 10, 'DTowsif Haider', 'Towsif', 'House No 3A, Amena Vobon, Road No:1 , Lane 4, Bashundhara Abashik Aleka, Halisahar', '01309092665', 'profile-image-378512240d268c62798a064675e4ba5504ea971684514869.jpeg'),
(13, 9, 'Md Rabiul Hasan Raju', 'bug finder', 'Chittagong, Bangladesh', '01879408425', 'profile-image-3692731687372838.png'),
(14, 11, 'serveritstudio', 'title', 'address', '01879408425', 'profile-image-482361685872852.png'),
(15, 13, '', '', '', '', 'profile-image-5597521684778410.png'),
(16, 29, 'Mahmud Nihaj', 'Graphics Designer', 'Shirin Monjil, Abdul Ali Nagar, Pahartali, Chittagong.', '+8801871879398', 'profile-image-9076601686661020.png');

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE `verification` (
  `id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`id`, `otp`, `email`) VALUES
(21, 13464, 'rabiulhasan2416@gmail.com'),
(22, 92496, 'rabiulhasan2416@gmail.com'),
(23, 7352, 'rabiulhasan2416@gmail.com'),
(24, 51165, 'rabiulhasan2416@gmail.com'),
(25, 60629, 'rabiulhasan2416@gmail.com'),
(26, 18109, 'rabiulhasan2416@gmail.com'),
(27, 28660, 'serveritstudio@gmail.com'),
(29, 23954, 'tisanim14@gmail.com'),
(30, 25653, 'tofiqkqzi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_form`
--
ALTER TABLE `admission_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus_des`
--
ALTER TABLE `campus_des`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campus_video`
--
ALTER TABLE `campus_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_queries_form`
--
ALTER TABLE `customer_queries_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_slider`
--
ALTER TABLE `on_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `top_bar`
--
ALTER TABLE `top_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upcoming_courses`
--
ALTER TABLE `upcoming_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_form`
--
ALTER TABLE `admission_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `campus_des`
--
ALTER TABLE `campus_des`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campus_video`
--
ALTER TABLE `campus_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_queries_form`
--
ALTER TABLE `customer_queries_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `on_slider`
--
ALTER TABLE `on_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `top_bar`
--
ALTER TABLE `top_bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upcoming_courses`
--
ALTER TABLE `upcoming_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
