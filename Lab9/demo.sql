-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2024 at 09:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `publication_year` date NOT NULL,
  `genre` enum('Fantasy','Science fiction','Mystery','Horror','Romance','Historical fiction','Biography','History','Self-help','Trave','Cookbook') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`id`, `author`, `title`, `publication_year`, `genre`) VALUES
(1, 'J.R.R. Tolkien', 'The Lord of the Rings', '1954-12-14', 'Fantasy'),
(2, 'George R.R. Martin', 'A Song of Ice and Fire', '1996-08-01', 'Fantasy'),
(3, 'J.R.R. Tolkien', 'The Lord of the Rings', '1954-12-14', 'Fantasy'),
(4, 'George R.R. Martin', 'A Song of Ice and Fire', '1996-08-01', 'Fantasy'),
(5, 'Neil Gaiman', 'The Sandman', '1989-01-01', 'Fantasy'),
(6, 'Brandon Sanderson', 'The Stormlight Archive', '2010-11-16', 'Fantasy'),
(7, 'Terry Pratchett', 'Discworld', '1983-04-21', 'Fantasy'),
(8, 'J.R.R. Tolkien', 'The Lord of the Rings', '1954-12-14', 'Fantasy'),
(9, 'George R.R. Martin', 'A Song of Ice and Fire', '1996-08-01', 'Fantasy'),
(10, 'Neil Gaiman', 'The Sandman', '1989-01-01', 'Fantasy'),
(11, 'Brandon Sanderson', 'The Stormlight Archive', '2010-11-16', 'Fantasy'),
(12, 'Terry Pratchett', 'Discworld', '1983-04-21', 'Fantasy'),
(13, 'N.K. Jemisin', 'The Broken Earth Trilogy', '2015-08-18', 'Fantasy'),
(14, 'Leigh Bardugo', 'Shadow and Bone', '2012-04-17', 'Fantasy'),
(15, 'Isaac Asimov', 'Foundation', '1951-01-01', 'Science fiction'),
(16, 'Arthur C. Clarke', '2001: A Space Odyssey', '1968-01-01', 'Science fiction'),
(17, 'Isaac Asimov', 'Foundation', '1951-01-01', 'Science fiction'),
(18, 'Arthur C. Clarke', '2001: A Space Odyssey', '1968-01-01', 'Science fiction'),
(19, 'Ray Bradbury', 'Fahrenheit 451', '1953-01-01', 'Science fiction'),
(20, 'Philip K. Dick', 'Do Androids Dream of Electric Sheep?', '1968-01-01', 'Science fiction'),
(21, 'Margaret Atwood', 'Oryx and Crake', '2003-01-01', 'Science fiction'),
(22, 'Isaac Asimov', 'Foundation', '1951-01-01', 'Science fiction'),
(23, 'Arthur C. Clarke', '2001: A Space Odyssey', '1968-01-01', 'Science fiction'),
(24, 'Ray Bradbury', 'Fahrenheit 451', '1953-01-01', 'Science fiction'),
(25, 'Philip K. Dick', 'Do Androids Dream of Electric Sheep?', '1968-01-01', 'Science fiction'),
(26, 'Margaret Atwood', 'Oryx and Crake', '2003-01-01', 'Science fiction'),
(27, 'Andy Weir', 'The Martian', '2011-01-01', 'Science fiction'),
(28, 'Ursula K. Le Guin', 'The Left Hand of Darkness', '1969-01-01', 'Science fiction'),
(29, 'N.K. Jemisin', 'The Fifth Season', '2015-08-04', 'Science fiction'),
(30, 'Pierce Brown', 'Red Rising', '2014-01-14', 'Science fiction'),
(31, 'Isaac Asimov', 'Foundation', '1951-01-01', 'Science fiction'),
(32, 'Arthur C. Clarke', '2001: A Space Odyssey', '1968-01-01', 'Science fiction'),
(33, 'Ray Bradbury', 'Fahrenheit 451', '1953-01-01', 'Science fiction'),
(34, 'Philip K. Dick', 'Do Androids Dream of Electric Sheep?', '1968-01-01', 'Science fiction'),
(35, 'Margaret Atwood', 'Oryx and Crake', '2003-01-01', 'Science fiction'),
(36, 'Andy Weir', 'The Martian', '2011-01-01', 'Science fiction'),
(37, 'Ursula K. Le Guin', 'The Left Hand of Darkness', '1969-01-01', 'Science fiction'),
(38, 'N.K. Jemisin', 'The Fifth Season', '2015-08-04', 'Science fiction'),
(39, 'Pierce Brown', 'Red Rising', '2014-01-14', 'Science fiction'),
(40, 'William Gibson', 'Neuromancer', '1984-01-01', 'Science fiction'),
(41, 'Agatha Christie', 'And Then There Were None', '1939-01-01', 'Mystery'),
(42, 'Stephen King', 'The Shining', '1980-01-01', 'Horror'),
(52, 'Isaac Asimov', 'Foundation', '1951-05-01', 'Science fiction'),
(53, 'Agatha Christie', 'And Then There Were None', '1939-01-01', 'Mystery'),
(54, 'Stephen King', 'The Shining', '1977-01-28', 'Horror'),
(55, 'Nicholas Sparks', 'The Notebook', '1996-10-01', 'Romance'),
(56, 'Hilary Mantel', 'Wolf Hall', '2009-04-20', 'Historical fiction'),
(57, 'Walter Isaacson', 'Steve Jobs', '2011-10-24', 'Biography'),
(58, 'Ronald H. Fritze', 'FDR and the End of Depression', '1983-01-01', 'History'),
(59, 'Eckhart Tolle', 'The Power of Now', '1997-01-01', 'Self-help'),
(60, 'Jane Austen', 'Pride and Prejudice', '1813-01-28', 'Romance'),
(61, 'George R.R. Martin', 'A Song of Ice and Fire', '1996-08-01', 'Fantasy'),
(62, 'Terry Pratchett', 'Discworld', '1983-04-21', 'Fantasy'),
(63, 'Ursula K. Le Guin', 'The Left Hand of Darkness', '1969-01-01', 'Fantasy'),
(64, 'Arthur C. Clarke', '2001: A Space Odyssey', '1968-04-18', 'Science fiction'),
(65, 'Ray Bradbury', 'Fahrenheit 451', '1953-10-09', 'Science fiction'),
(66, 'Philip K. Dick', 'Do Androids Dream of Electric Sheep?', '1968-01-01', 'Science fiction'),
(67, 'Arthur Conan Doyle', 'The Adventures of Sherlock Holmes', '1892-10-23', 'Mystery'),
(68, 'P.D. James', 'Cover Her Face', '1962-01-01', 'Mystery'),
(69, 'Stieg Larsson', 'The Girl with the Dragon Tattoo', '2005-08-31', 'Mystery'),
(70, 'Mary Shelley', 'Frankenstein', '1818-01-01', 'Horror'),
(71, 'Bram Stoker', 'Dracula', '1897-05-04', 'Horror'),
(72, 'H.P. Lovecraft', 'The Call of Cthulhu', '1928-02-22', 'Horror'),
(73, 'Jane Eyre', 'Charlotte Brontë', '1847-12-16', 'Romance'),
(74, 'Gone With the Wind', 'Margaret Mitchell', '1936-06-30', 'Romance'),
(75, 'Pride and Prejudice', 'Jane Austen', '1813-01-28', 'Romance'),
(76, 'Ken Follett', 'Pillars of the Earth', '1989-09-29', 'Historical fiction'),
(77, 'Orhan Pamuk', 'My Name is Red', '1998-01-01', 'Historical fiction'),
(78, 'Howard Fast', 'Spartacus', '1951-01-01', 'Historical fiction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
