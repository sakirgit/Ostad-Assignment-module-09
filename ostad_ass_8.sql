-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 08:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ostad_ass_8`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `post_image` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `description`, `post_image`, `datetime`, `status`, `user_id`) VALUES
(4, 'y', 'Ullamcorper turpis, esse, error fugiat natus viverra! Elementum, cum quasi, elementum perspiciatis odit, aliquam labore nam ornare amet montes elit tempus delectus netus soluta, malesuada sequi turpis labore optio impedit. Potenti minus per corporis accusantium dis placerat, porttitor massa eleifend mattis officia! Diamlorem, vivamus eget montes? Lorem iure? Commodo cursus.\n\nFacilisi laboriosam cubilia sagittis laborum atque! Habitasse quisque maiores eius veritatis assumenda. Occaecat porro ullamco aenean error curabitur perferendis, velit occaecati imperdiet officiis labore pede vero! Mauris, sociis, fugiat nam praesent curae luctus, massa, sociosqu turpis! Integer, vivamus, aliqua itaque, exercitation deleniti adipiscing ipsam cum facilisis. Mi eleifend sit, urna.\n\nIllum laboris itaque! Placerat. Parturient! Tenetur. Aut purus eos tempore diamlorem, auctor euismod nihil id quos maxime, hac sociosqu temporibus rhoncus. Quis porro dapibus. Recusandae. Incidunt ullam, ex non hymenaeos possimus litora! Pharetra pariatur possimus minus similique diamlorem consectetur. Fusce sapiente litora purus itaque justo, itaque? Eiusmod molestiae, hymenaeos culpa.\n\nSint fermentum animi reiciendis! Cursus nisi cupidatat officia, ratione montes mollitia dolorem, quisque, hymenaeos, nostra! Ipsa lectus quos cillum nisi fugit praesent similique vivamus excepturi praesentium, ipsum! Quaerat. Luctus, quidem ipsa aliquet purus sodales, minus maecenas venenatis donec error bibendum bibendum tristique leo facilisi a recusandae eget quaerat, tortor nihil.', 'uploads/logo.png', '2023-04-11 16:18:06', 1, 1),
(8, 'fg', 'Pariatur metus debitis repudiandae illo quidem faucibus scelerisque. Pharetra maxime labore massa facere eu! Culpa duis modi recusandae. Quae sed. Ultricies, platea sapien adipiscing? Odit accumsan. Pariatur reiciendis unde? Aperiam! Tempora voluptate assumenda? Cumque eros erat aliqua viverra veniam iusto dis dignissim? Aspernatur excepturi? Architecto explicabo penatibus recusandae, cupidatat doloribus.\n\nVulputate potenti lobortis, natus! Blandit tempor per? Tellus animi eius ad? Maiores elit expedita ipsum suspendisse? Volutpat nunc? Ipsa sodales? Facilisi facilis impedit luctus, condimentum molestiae sequi facilisi quas, dictum. Sodales perferendis, sociis! Congue rutrum suscipit unde voluptatem! Ullam! Quia at ab! Consectetuer voluptatibus assumenda interdum modi accusamus, augue metus.\n\nPurus, incidunt platea, nostra porttitor a tincidunt ligula, quae litora praesent provident repellat netus, praesent nisi quaerat porta dolore eos incididunt quas nonummy nisl, et? Orci hic mollitia, praesent posuere, nobis dapibus! Repudiandae non. Curae erat. Nec cupiditate, perferendis risus fugit tincidunt, fugit wisi class! Sed? Sunt venenatis, metus tellus.\n\nUnde dui mollis eget, fringilla. Nobis impedit, sit! Saepe nostra, asperiores dapibus? Cupidatat nostrum ultrices! Labore, senectus ad ornare aenean? Unde dictum similique penatibus, pede imperdiet ullam? Ridiculus nostra nesciunt, accusamus esse veritatis praesent cillum, amet optio laboriosam optio? Ultrices habitasse pulvinar at consectetuer! Sociis? Mus quam veniam soluta inventore.', 'uploads/bg_banner2.jpg', '2023-04-11 16:22:38', 1, 1),
(12, 'bc', 'Expedita risus, interdum? Sed velit adipisicing officiis eget vestibulum ultrices eu repellendus, lacus mi, laudantium laboris leo lectus nisi mollitia magna error vel temporibus, explicabo. Enim cupidatat neque assumenda dictumst? Dolorem ratione, corporis, felis praesent erat. Pharetra ea vehicula duis, omnis molestiae similique adipiscing! Beatae. Nemo ex nobis. Tempora quod.\n\nVestibulum voluptatibus tempor massa vivamus incidunt nullam ullam fugiat leo, quasi corrupti quo laboris risus nihil sequi, litora, mollitia laoreet consectetuer autem ridiculus nec quos aliquet? Risus ipsum? Sapiente reprehenderit ut illo, cubilia. Aliquet rem fugit, duis a ipsam porttitor, necessitatibus hac venenatis dolorum dignissim mollit nemo proin! Habitant ullamco.\n\nCorporis possimus enim nam! Aptent praesentium placerat consequat laborum est, facilisi perspiciatis, luctus cumque nec, cras recusandae impedit neque, omnis, pretium turpis? Eum volutpat, sagittis odio, et sagittis, quam ultrices, netus omnis! Fringilla voluptates, eius impedit magnam curabitur. Condimentum. Sapiente. Auctor lobortis hendrerit temporibus voluptatibus? Unde cumque bibendum suscipit donec.\n\nVeniam mauris felis porro autem vivamus sociosqu consequatur sagittis morbi. Tempus exercitation assumenda optio, lectus platea eius, perspiciatis delectus laoreet, vulputate asperiores laudantium ornare, fringilla ante dignissimos wisi ducimus quasi sociosqu rhoncus sociis impedit faucibus ultricies! Perferendis, est! Penatibus erat laboris cumque! Felis sequi, numquam laudantium aptent veniam perspiciatis? Ullam.', 'uploads/robert-icon1.jpg', '2023-04-11 16:29:09', 1, 1),
(13, 'Omnis et consequat ', 'Nascetur, voluptas laboriosam, natoque torquent! Feugiat! Voluptates, qui, animi accusamus nostrum eveniet vero distinctio nemo vitae lobortis platea magnam at, saepe, curabitur dapibus excepturi. Nobis quidem, orci quis, magnis eligendi, class ante ultricies taciti rhoncus magnis, illo proin ducimus! Eu error convallis, venenatis volutpat duis excepturi maxime eum est lacinia.\n\nPorta totam, bibendum placeat, per aliquip netus eiusmod rutrum deleniti? Congue aliquid! Eveniet curabitur deserunt, quo! Fugiat, sem netus, suscipit, convallis laboris blandit risus? Elit est suscipit aliquet, accusamus turpis quisque torquent. Auctor aspernatur, litora cubilia exercitation asperiores? Lobortis, conubia, aperiam magni facilisis occaecat tristique! Error aut vehicula urna cumque.\n\nLibero quasi consectetuer aptent rem elementum doloribus mattis accumsan quam incidunt! Voluptatibus? Molestiae facilis pellentesque, blanditiis gravida occaecati ab provident. Metus natus! Magnis nisl. Ac posuere. Provident fermentum placerat nihil cupidatat maxime dolorem ullam. Aspernatur proin veniam, eros asperiores curae? Phasellus aperiam senectus mi? Soluta culpa, tellus bibendum tempore porttitor.\n\nPorro laboriosam, morbi occaecat aspernatur mollitia praesent in ultrices odit, risus molestie, dignissim amet elit? Dui, penatibus varius pharetra fames, luctus, mattis delectus, provident, curae exercitationem eleifend, voluptates nesciunt! Hac, interdum ut. Dolor pulvinar, torquent? Dolor asperiores tempore beatae dis, senectus gravida! Fugit omnis, platea, nemo rutrum quisquam. Diam primis.', 'uploads/project4.jpg', '2023-04-15 00:50:06', 1, 1),
(14, 'Architecto adipisici', 'Mus? Numquam labore optio, exercitationem aenean placerat, quis dolor faucibus, nostrud imperdiet! Blanditiis aliquid curae error tristique quos repellat. Sociis aliquet. Placerat lobortis adipisci nec commodi nisl nesciunt, luctus debitis velit in, id voluptatum sapien phasellus platea purus fermentum velit officiis, cras? Potenti saepe, semper convallis aliquip nibh? Erat sapiente.\n\nAliquid augue quos torquent libero quos veniam pretium possimus iure. Parturient quia nesciunt? Irure, metus purus porta alias ligula accusantium vero ratione class doloribus accumsan leo et libero nunc dolores odio tempora accumsan minima harum vivamus. Modi semper! Facere dolore, quis facilis, quisque ac mollitia occaecat id eleifend platea ipsa.\n\nEgestas nulla sociosqu vitae? Fringilla, doloremque, hac gravida! Quisque quisque fusce, eum! Asperiores saepe sit distinctio placeat magna iaculis facilisis leo iure quas excepturi wisi eu eleifend, molestie! Tempora optio. Varius tellus metus ullamco! Anim curae urna laborum soluta? Sapien fuga nostrum, distinctio vehicula voluptatibus interdum adipisci ullamcorper molestie do.\n\nDis nibh facilis vehicula netus officia. Venenatis deleniti quia dis ut diam purus facere aute. Magnam asperiores aliquid, scelerisque euismod, consectetur incididunt tenetur vivamus dui. Laboris scelerisque dapibus alias similique, provident eius. Ornare mollit pariatur atque, taciti voluptates netus, rutrum, quo! Dignissim, fringilla tellus! Eget distinctio? Maecenas sed! Curabitur volutpat.', 'uploads/pms-logo-tin.png', '2023-04-15 00:57:58', 1, 1),
(15, 'Velit quam ea conse', 'Convallis deleniti voluptas, maxime aliquet. Atque purus hac perspiciatis, laudantium sequi posuere, dolorum volutpat necessitatibus provident dolore proin hendrerit deleniti! Aperiam odio? Purus eleifend felis platea libero fermentum curae ex. Primis accusamus at fringilla porta etiam cupiditate eiusmod harum autem? Exercitationem architecto molestiae, amet non repudiandae dui eius pulvinar integer.\n\nFugiat cupidatat bibendum assumenda debitis sunt! Adipisicing quidem cum mollis! Necessitatibus optio, volutpat proident doloribus eum? Delectus curabitur bibendum molestias dui! Porttitor, mollitia massa, eos vehicula nascetur ridiculus! Dignissim fusce? Nunc consectetuer, unde rutrum pariatur. Facere, viverra distinctio, vulputate adipiscing tortor venenatis. Porro architecto, sociis mi quos mattis veniam aliquid.\n\nDiamlorem eu sem ultricies eum excepteur varius facilisi, non pulvinar facilis omnis harum, exercitationem, do dis enim consequuntur architecto error, platea mollitia, quas taciti dictum vulputate donec nunc sunt eligendi deserunt orci fringilla exercitation? Suspendisse minim, massa molestias blandit tempora! Fusce cursus deserunt expedita tenetur, interdum, varius hymenaeos error, quibusdam.\n\nFringilla wisi proin nobis et penatibus aptent, nibh curae, exercitation totam sociis, mollit condimentum, risus pulvinar eligendi architecto, eum irure adipisicing excepteur necessitatibus exercitationem dicta ratione tortor? Diamlorem, non cumque? Officia habitant. Incidunt interdum orci aperiam, officia laboris! Nisi interdum! Viverra platea quisque ex? Erat? Cum lectus earum id blandit.', 'uploads/pms-logo-tin.png', '2023-04-15 01:00:27', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_and_category`
--

CREATE TABLE `post_and_category` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_and_category`
--

INSERT INTO `post_and_category` (`id`, `category_id`, `post_id`) VALUES
(1, 1, 9),
(2, 2, 9),
(3, 5, 9),
(4, 1, 10),
(5, 2, 10),
(6, 3, 10),
(7, 1, 11),
(8, 3, 11),
(9, 6, 11),
(10, 3, 12),
(11, 5, 12),
(12, 6, 12),
(40, 2, 14),
(41, 6, 14),
(42, 2, 15),
(43, 5, 15),
(44, 1, 13),
(45, 2, 13),
(46, 3, 13),
(47, 6, 13),
(50, 2, 4),
(51, 5, 4),
(56, 1, 8),
(57, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `category_title`) VALUES
(1, 'Featured Post ***'),
(2, 'Category item G'),
(3, 'New category VY'),
(5, 'New category VG'),
(6, 'New category V'),
(13, 'Candace Chang dde');

-- --------------------------------------------------------

--
-- Table structure for table `settings_contents`
--

CREATE TABLE `settings_contents` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `des` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `content_for` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_contents`
--

INSERT INTO `settings_contents` (`id`, `title`, `des`, `image`, `status`, `content_for`) VALUES
(1, 'Welcome to our site', 'Lorem Platea donec praesentium ducimus', 'uploads/image-1653730243589784013 (1).jpeg', 1, 'home-welcome-message'),
(2, 'Site Logo', 'Site Logo', 'uploads/logo-sm.png', 1, 'logo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_email`, `password`) VALUES
(1, 'Sakir Ahamed Bissas', 'sakiremail@gmail.com', '$2y$10$cgfU5wLOSViEqxD/I5d5V.vXFn.i3efznr3JoKf0FYyJtU3a8dRMC'),
(2, 'PMS Admin', 'tommy05@yopmail.com', '$2y$10$axI8PeFp3RjCRig5Zprfj.1r3BG91Rn60dcXgGKHLvXlvw6SI.Sj6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_and_category`
--
ALTER TABLE `post_and_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_contents`
--
ALTER TABLE `settings_contents`
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
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `post_and_category`
--
ALTER TABLE `post_and_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings_contents`
--
ALTER TABLE `settings_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
