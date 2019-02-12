CREATE TABLE `shorturls` (
  `id` int(11) NOT NULL,
  `URL` varchar(1000) NOT NULL,
  `ShortUrl` varchar(1000) NOT NULL,
  `IsCustom` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `shorturls`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `shorturls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
