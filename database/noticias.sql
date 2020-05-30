-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2020 a las 03:10:06
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id` int(100) NOT NULL,
  `link` varchar(200) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `id_pagina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id`, `link`, `titulo`, `autor`, `fecha`, `hora`, `descripcion`, `id_pagina`) VALUES
(83, 'https://es.gizmodo.com/nintendo-acude-al-rescate-despues-de-que-a-una-abuela-d-1841917900', 'Nintendo acude al rescate después de que a una abuela de 95 años se le rompiera su Game Boy', 'Andrew Liszewski', '2020-02-25', '23:31:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--76SXLPrr--/c_fit,fl_progressive,q_80,w_636/twmwkzzftgfly1mqkkiy.jpg\"><p>Nintendo es conocida por su excelente servicio al cliente, pero de vez en cuando la compañía también va mas allá del llamado del deber en casos muy especiales. Cuando los técnicos no pudieron arreglar el <a href=\"https://es.gizmodo.com/relajate-con-este-fantastico-video-en-el-que-restauran-1835198178\">Game Boy original</a> de una mujer japonesa de 95 años, la com', 10),
(147, 'https://es.gizmodo.com/como-jugar-a-los-juegos-secretos-de-chrome-firefox-y-e-1843715285', 'Cómo jugar a los juegos secretos de Chrome, Firefox y Edge', 'David Murphy', '2020-05-28', '00:29:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--qx5-prYP--/c_fit,fl_progressive,q_80,w_636/slrrmodg6tq05t1tlcdz.png\"><p>Tu navegador web está lleno de secretos. Suelo pasar mucho tiempo estudiando nuevas funciones que puedo desbloquear a través de páginas como chrome://flags y about:config en el navegador, pero a veces también es justo y necesario tomar un descanso y jugar los juegos que esconden los navegadores más populares.</p><p><a href=\"https://es.gizmodo.com/como-jugar-a-los', 10),
(148, 'https://es.gizmodo.com/resuelto-el-misterio-del-extrano-objeto-activo-en-la-1843712420', 'Resuelto el misterio del \"extraño objeto activo\" en la órbita de Júpiter', 'Matías S. Zavia', '2020-05-28', '00:16:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--lallTbbn--/c_fit,fl_progressive,q_80,w_636/yhy5vwmcb5lmw5fgncqu.jpg\"><p>Los astrónomos vivieron una jornada emocionante la semana pasada cuando creyeron descubrir <a href=\"https://es.gizmodo.com/un-extrano-objeto-activo-en-la-orbita-de-jupiter-ha-des-1843601341\">algo único en la órbita de Júpiter</a>. El objeto 2019 LD2 fue identificado como el primer “asteroide troyano activo” conocido por la ciencia porque tenía una cola similar a ', 10),
(149, 'https://es.gizmodo.com/zack-snyder-revela-al-villano-de-la-nueva-version-de-ju-1843713822', 'Zack Snyder revela al villano de la nueva versión de Justice League, el Snyder Cut', 'Eduardo Marín', '2020-05-27', '23:21:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--kckNuRrD--/c_fit,fl_progressive,q_80,w_636/bdjpjwvdl3oeq6lrh57b.png\"><p><a href=\"https://es.gizmodo.com/el-snyder-cut-es-real-la-version-de-zack-snyder-de-jus-1843569564\">El Snyder Cut es real</a>. En 2021 veremos una nueva versión de <em>Justice League</em>, una que mostrará la visión original de su director Zack Snyder para esta historia. En esa versión el villano en realidad no era Steppenwolf, sino nada más y nada menos que Darks', 10),
(150, 'https://es.gizmodo.com/spacex-aborta-mision-por-mal-tiempo-la-crew-dragon-vol-1843712758', 'SpaceX aborta misión por mal tiempo: la Crew Dragon volará este sábado', 'Matías S. Zavia', '2020-05-27', '22:37:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--O3pid6Li--/c_fit,fl_progressive,q_80,w_636/pwrcbo4tkwjlzne6nvjz.jpg\"><p>SpaceX ha abortado su primer intento de <a href=\"https://es.gizmodo.com/como-seguir-minuto-a-minuto-el-primer-lanzamiento-tri-1843688409\">enviar astronautas a la Estación Espacial Internacional</a> por un exceso de electricidad atmosférica en la ruta programada para el vuelo. La próxima oportunidad de lanzamiento de la nave Crew Dragon tendrá lugar el sábado 30 d', 10),
(151, 'https://es.gizmodo.com/por-que-los-murcielagos-no-enferman-de-los-virus-que-t-1843710556', '¿Por qué los murciélagos no enferman de los virus que transmiten, pero los humanos sí? La respuesta está en la fiebre', 'Eduardo Marín', '2020-05-27', '20:27:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--fgBhu2nL--/c_fit,fl_progressive,q_80,w_636/rug5ccaamoeb10klhccb.jpg\"><p>La hipótesis más aceptada por la comunidad científica asegura que el origen del coronavirus, <a href=\"https://es.gizmodo.com/el-genoma-completo-del-coronavirus-sars-cov-2-en-una-im-1843576105\">SARS-CoV-2</a>, <a href=\"https://es.gizmodo.com/un-nuevo-coronavirus-similar-al-causante-de-la-pandemia-1843410418\">está en los murciélagos</a>. Sin embargo, esto genera un', 10),
(152, 'https://es.gizmodo.com/que-es-el-juego-de-atrapa-la-bandera-de-obama-que-space-1843708772', 'Qué es el juego de atrapa la bandera de Obama que SpaceX está a punto de ganar', 'Matías S. Zavia', '2020-05-27', '19:43:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--bMtfqECQ--/c_fit,fl_progressive,q_80,w_636/xcvmvtl2rbbzztelkya4.jpg\"><p>Ayer <a href=\"https://es.gizmodo.com/como-seguir-minuto-a-minuto-el-primer-lanzamiento-tri-1843688409\">comentaba</a> que la misión de SpaceX a la Estación Espacial Internacional tenía un carácter muy patriótico para Estados Unidos. Marca el primer lanzamiento tripulado desde suelo estadounidense en nueve años, y tiene lugar en la misma plataforma de lanzamiento q', 10),
(153, 'https://es.gizmodo.com/los-directores-de-suicide-squad-y-ghostbusters-quieren-1843706800', 'Los directores de Suicide Squad y Ghostbusters quieren sacar nuevas versiones. El de Fantastic Four dice “no, gracias”', 'Eduardo Marín', '2020-05-27', '18:13:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--alH0oPSk--/c_fit,fl_progressive,q_80,w_636/ms5pir2nhpfhp4cfp4od.jpg\"><p>Bienvenidos a la nueva era en la que existe la posibilidad de que una película vuelva a ser publicada con cambios en la trama y nuevas escenas, bajo la excusa de que esta sí es la versión que el director o guionista tenía pensada. Pasará con <em>Justice League</em>, y ahora los directores de <em>Suicide Squad</em> y <em>Ghostbusters</em>…</p><p><a href=\"https://e', 10),
(154, 'https://es.gizmodo.com/cierra-amazon-pantry-el-intento-de-supermercado-de-ama-1843704424', 'Cierra Amazon Pantry, el intento de supermercado de Amazon', 'Matías S. Zavia', '2020-05-27', '16:51:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--VreQp3Bk--/c_fit,fl_progressive,q_80,w_636/cckdkomzbthpcq9yepz0.png\"><p>Amazon ha anunciado hoy el cierre de Amazon Pantry en España. Pantry es un supermercado online para suscriptores de Amazon Prime que solo está disponible en un puñado de países: añades productos de alimentación, limpieza e higiene a una cesta virtual y Amazon te los envía a casa añadiendo 5 euros de gasto de envío…</p><p><a href=\"https://es.gizmodo.com/cierra-ama', 10),
(155, 'https://es.gizmodo.com/el-teclado-del-nuevo-macbook-pro-de-13-pulgadas-es-real-1843699263', 'El teclado del nuevo MacBook Pro de 13 pulgadas es realmente bueno', 'Caitlin McGarry', '2020-05-27', '16:21:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--TgPJeLkM--/c_fit,fl_progressive,q_80,w_636/qduiwooctcsrl9uzdpxw.png\"><p>Aquí estoy, escribiendo en el nuevo MacBook Pro de 13 pulgadas de Apple, viendo como se ha convertido en una actualización radical de los MacBook Pro de 13 pulgadas de <a href=\"https://gizmodo.com/the-new-apple-macbook-pro-is-so-good-the-price-is-almos-1827802621\">estos últimos años</a>. El MacBook Pro que compré en 2017 se encuentra a mi izquierda, y aunque los ', 10),
(156, 'https://es.gizmodo.com/el-cdc-alerta-de-que-las-ratas-estan-volviendose-mas-ag-1843700154', 'El CDC alerta de que las ratas están volviéndose más agresivas debido a la pandemia de coronavirus', 'Carlos Zahumenszky', '2020-05-27', '13:18:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--uZlmwxyQ--/c_fit,fl_progressive,q_80,w_636/f19elmmirqiuhb089jii.jpg\"><p>No, las ratas no sufren, que sepamos, de covid-19, pero la pandemia de coronavirus las está afectando de una manera indirecta. Se están quedando sin comida. Eso está haciendo que se vuelvan más desesperadas y agresivas hasta el punto de que el Centro de Control de Enfermedades ha publicado una alerta.<br></p><p><a href=\"https://es.gizmodo.com/el-cdc-alerta-de-que', 10),
(157, 'https://es.gizmodo.com/construir-una-futurista-casa-flotante-en-48-horas-el-u-1843699515', 'Construir una futurista casa flotante en 48 horas, el último reto de la impresión 3D', 'Miguel Jorge', '2020-05-27', '12:45:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--3yf2bPTG--/c_fit,fl_progressive,q_80,w_636/ak9l4lfsufujccwmxiok.jpg\"><p>Esta semana nuestro compañero Carlos nos <a href=\"https://es.gizmodo.com/probe-una-impresora-3d-imprimi-un-huevo-de-juego-de-tr-1843334213\">adentraba</a> en el <em>peligroso</em> mundo de la impresión 3D casera, un hobby que entra por los ojos y que fácilmente nos puede <em>agujerear</em> la cartera. En cualquier caso, la tecnología avanza en muchos otros sectore', 10),
(158, 'https://es.gizmodo.com/spotify-por-fin-quita-el-limite-de-canciones-que-podiam-1843699176', 'Spotify por fin quita el límite de canciones que podíamos guardar en nuestra biblioteca', 'Julio Cerezo', '2020-05-27', '12:22:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--otppFWyo--/c_fit,fl_progressive,q_80,w_636/lpetekn2seo5oc9bzg2w.jpg\"><p>Hoy en día, millones de personas escuchan música en Spotify. Pero hasta hace poco, los melómanos teníamos una gran queja hacia el servicio de streaming: solo podíamos almacenar un cierto número de canciones y, cuando habíamos alcanzado ese límite, era  necesario eliminar música de nuestra biblioteca para poder guardar…</p><p><a href=\"https://es.gizmodo.com/spotif', 10),
(159, 'https://es.gizmodo.com/el-clasico-de-los-80-dentro-del-laberinto-tendra-una-se-1843698857', 'El clásico de los 80 Dentro del Laberinto tendrá una secuela y se encargará de ella el director de Dr. Strange', 'Carlos Zahumenszky', '2020-05-27', '11:59:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--iuJFJprc--/c_fit,fl_progressive,q_80,w_636/u5k2324chfwvu81bo5yl.jpg\"><p>En los 80 se estrenaron tres clásicos del cine fantástico protagonizados por las maravillosas marionetas de Jim Henson. <em>Cristal Oscuro</em> (1982) y <em>Labyrinth</em> (1986), La primera ya ha disfrutado de una secuela bastante competente en forma de la serie de Netflix <em>The Dark Crystal: Age of Resistence</em>. Ahora es el turno de <em></em>…</p><p><a hre', 10),
(160, 'https://es.gizmodo.com/asi-derriba-un-arma-laser-de-la-marina-de-ee-uu-un-dron-1843697963', 'Así derriba un arma láser de la Marina de EE.UU un dron enemigo', 'Miguel Jorge', '2020-05-27', '11:07:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--a3jL41gj--/c_fit,fl_progressive,q_80,w_636/rmgpyk7dz1pph20yibih.jpg\"><p>Llevamos mucho tiempo hablando del uso militar de la tecnología láser, pero lo cierto es que hemos visto muy pocas veces este tipo de armas en acción. Ahora, un vídeo que ha visto la luz nos ofrece una de las <a href=\"https://www.iflscience.com/technology/us-navy-released-footage-laser-weapon-shooting-down-drone-first-time/\" target=\"_blank\" rel=\"noopener noreferr', 10),
(161, 'https://es.gizmodo.com/el-meteorito-que-acabo-con-los-dinosaurios-cayo-en-el-a-1843697658', 'El meteorito que acabó con los dinosaurios cayó en el ángulo perfecto para causar el máximo daño', 'Carlos Zahumenszky', '2020-05-27', '10:41:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--cXBdOwLr--/c_fit,fl_progressive,q_80,w_636/mdindpgynadw8ix3qvxm.jpg\"><p>Sobre nuestro planeta han caído muchos meteoritos, pero el que acabó con los dinosaurios hace 66 millones de años fue algo realmente especial. No solo era enorme y cayó a una velocidad elevadísima. Además cayó en el ángulo perfecto para causar el máximo daño posible.<br></p><p><a href=\"https://es.gizmodo.com/el-meteorito-que-acabo-con-los-dinosaurios-cayo-en-el-a', 10),
(162, 'https://es.gizmodo.com/un-nuevo-motorola-razr-con-mejor-camara-y-5g-podria-lle-1843697330', 'Un nuevo Motorola Razr con mejor cámara y 5G podría llegar antes de que acabe el año', 'Julio Cerezo', '2020-05-27', '10:12:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--vB__ZKmZ--/c_fit,fl_progressive,q_80,w_636/irkxajfsnmc5rgufw1gr.jpg\"><p>El <a href=\"https://es.gizmodo.com/motorola-razr-es-el-primer-telefono-plegable-que-tiene-1841576824\">nuevo Motorola Razr</a>, la versión renovada del clásico de la década de los 2000, ni siquiera lleva en el mercado 6 meses y, según los últimos rumores, parece que podríamos ver un nuevo modelo de este teléfono antes de que acabe el año, con mejores especificacio', 10),
(163, 'https://es.gizmodo.com/tesla-recorta-el-precio-de-sus-autos-en-miles-de-dolare-1843696962', 'Tesla rebaja por sorpresa el precio de sus autos en miles de dólares', 'Miguel Jorge', '2020-05-27', '09:43:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--aC42AEzf--/c_fit,fl_progressive,q_80,w_636/ygqalja5lvthuome0wpc.jpg\"><p>Sin previo aviso, Tesla <a href=\"https://electrek.co/2020/05/27/tesla-cuts-prices-lineup/\" target=\"_blank\" rel=\"noopener noreferrer\">ha reducido el precio</a> de la flota de sus automóviles eléctricos en mitad de la noche en los mercados de Estados Unidos y China. No se trata de una rebaja cualquiera, el recorte de precios es de miles de dólares en casi todos los', 10),
(164, 'https://es.gizmodo.com/esta-pantalla-de-sabores-es-capaz-de-recrear-cualquier-1843696589', 'Esta pantalla de sabores es capaz de recrear cualquier sabor conocido con solo lamerla', 'Andrew Liszewski', '2020-05-27', '09:11:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--DoNaQxlS--/c_fit,fl_progressive,q_80,w_636/ynef8xzgsozldbvl9qcw.jpg\"><p>Normalmente no es buena idea lamer tu teléfono móvil, y mucho menos en los tiempos que corren, pero un investigador de la Universidad de Meiji, en Japón, quiere cambiar eso. <a href=\"https://research.miyashita.com/papers/I42\" target=\"_blank\" rel=\"noopener noreferrer\">Homei Miyashita</a> acaba de crear un dispositivo electrónico que <a href=\"https://research.miyas', 10),
(165, 'https://es.gizmodo.com/android-ahora-cuenta-con-uno-de-los-mejores-emuladores-1843696304', 'Android ahora cuenta con uno de los mejores emuladores de Nintendo 3DS', 'Miguel Jorge', '2020-05-27', '08:47:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--ClDJnHhA--/c_fit,fl_progressive,q_80,w_636/zioodqvrc40zgkzhao6c.jpg\"><p>Si tienes un Android ahora tienes la oportunidad de probar uno de los <a href=\"https://kotaku.com/android-now-has-a-very-good-3ds-emulator-1843689043\">mejores emuladores de la Nintendo 3DS</a> que existen para teléfonos. En la Play Store de Google ya puedes descargar una versión oficial de <a href=\"https://citra-emu.org/entry/announcing-citra-android/\" target=\"_b', 10),
(166, 'https://es.gizmodo.com/como-seguir-minuto-a-minuto-el-primer-lanzamiento-tri-1843688409', 'Cómo seguir, minuto a minuto, el primer lanzamiento tripulado de SpaceX', 'Matías S. Zavia', '2020-05-27', '00:47:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--46JE9Ejv--/c_fit,fl_progressive,q_80,w_636/ciihsyeqzpqfvc1sfyvt.jpg\"><p>El día ha llegado. Si el tiempo acompaña (hay un 40% de probabilidad de que no sea así), <a href=\"https://es.gizmodo.com/la-nasa-da-luz-verde-para-la-primera-mision-tripulada-a-1843618295\">este miércoles SpaceX hará historia</a> lanzando por primera vez una misión tripulada para la NASA. Será el primer vuelo comercial a la Estación Espacial Internacional y la pru', 10),
(167, 'https://es.gizmodo.com/whatsapp-presenta-un-bot-para-desmentir-fake-news-sobre-1843685714', 'WhatsApp presenta un bot para desmentir fake news sobre el coronavirus', 'Matías S. Zavia', '2020-05-26', '22:43:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--Phk7xk30--/c_fit,fl_progressive,q_80,w_636/em4dnb3egrwcfppl0aev.png\"><p>WhatsApp ha anunciado hoy que el bot de la Red Intencional de Verificación de Datos (IFCN) ya está disponible en español, lo que significa que ahora tienes una fuente respaldada por la compañía para contrastar noticias sobre el coronavirus.</p><p><a href=\"https://es.gizmodo.com/whatsapp-presenta-un-bot-para-desmentir-fake-news-sobre-1843685714\">Read more...</a></', 10),
(168, 'https://es.gizmodo.com/realme-planta-cara-a-xiaomi-con-su-propia-pulsera-y-un-1843679443', 'Realme planta cara a Xiaomi con su propia pulsera y un teléfono con SuperZoom', 'Matías S. Zavia', '2020-05-26', '18:33:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--7Ho7J3II--/c_fit,fl_progressive,q_80,w_636/s8dhagdmbhgnkwotudan.jpg\"><p>Realme, la marca más reciente del conglomerado chino al que pertenecen Oppo y OnePlus, viene pisando fuerte sobre terreno de Xiaomi con su último catálogo de novedades. Hoy ha presentado en España la siguiente batería productos:</p><p><a href=\"https://es.gizmodo.com/realme-planta-cara-a-xiaomi-con-su-propia-pulsera-y-un-1843679443\">Read more...</a></p>', 10),
(169, 'https://es.gizmodo.com/la-nueva-camara-zv-1-de-sony-quiere-convertirse-en-la-c-1843678728', 'La nueva cámara ZV-1 de Sony quiere convertirse en la cámara para vloggers definitiva', 'Andrew Liszewski', '2020-05-26', '18:03:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--CCpToJVu--/c_fit,fl_progressive,q_80,w_636/fynetuirmjvlkkhnhqww.png\"><p>Las DSLR y las cámaras sin espejo se han convertido en una herramienta bastante popular entre YouTubers que buscan darle un toque mucho más profesional a sus vídeos, pero para cualquiera que no haya tocado una cámara en su vida, la complejidad de esas cámaras puede llegar a ser abrumadora. La <a href=\"https://gizmodo.com/sonys-leaked-zv-1-might-be-the-perfect-cam', 10),
(170, 'https://es.gizmodo.com/cuales-serian-las-mejores-y-peores-series-de-la-histori-1843676684', 'Cuáles serían las mejores y peores series de la historia si solo contase su último capítulo', 'Julio Cerezo', '2020-05-26', '16:44:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--4270Cq2p--/c_fit,fl_progressive,q_80,w_636/mejhi6kyti1n6zzz7pap.png\"><p>Conseguir cerrar con acierto una serie es una labor complicada, y sino que se lo pregunten a los creadores de <a href=\"https://es.gizmodo.com/370-000-personas-firman-una-peticion-para-que-hbo-vuelv-1834809982\">Juego de Tronos</a>. Si tuviésemos que elaborar un <em>ranking</em> y juzgar una serie exclusivamente por su último capítulo, ¿qué puesto ocuparía cada una', 10),
(171, 'https://es.gizmodo.com/los-nuevos-auriculares-de-realme-son-un-clon-de-los-air-1843676343', 'Los nuevos auriculares de Realme son un clon de los AirPods a buen precio', 'Matías S. Zavia', '2020-05-26', '16:29:00', '<img src=\"https://i.kinja-img.com/gawker-media/image/upload/s--E9siVZ0Y--/c_fit,fl_progressive,q_80,w_636/hehaxvhfugen51d3t9gh.jpg\"><p>Realme sigue ampliando su catálogo a un ritmo endiablado. Uno de los últimos lanzamientos de la marca son los Realme Buds Air Neo, la segunda generación de unos auriculares descaradamente parecidos a los AirPods de Apple que incorporan un nuevo chip de baja latencia a un precio más que razonable.</p><p><a href=\"https://es.gizmodo.com/los-nuevos-auriculares-de-rea', 10),
(172, 'http://www.reforma.com/deportes/articulo/580872/', 'Triunfa Ponce pese a deshidratación', 'Desconocido', '2005-11-08', '07:19:01', 'Enrique Ponce actuó en Cartagena de Indias, Colombia, bajo un fuerte cuadro de deshidratación, cortó tres orejas y fue el máximo triunfador.', 13),
(173, 'http://www.reforma.com/deportes/articulo/580858/', 'Analiza Vergara frenar rotación', 'Desconocido', '2005-11-08', '05:21:40', 'El dueño de Chivas, Jorge Vergara, fue muy claro al señalar que no quiere  experimentar con los jugadores, dijo que jugarán cada uno en su posición.', 13),
(174, 'http://www.reforma.com/el-show-debe-continuar-indie-rocks/ar1952750', 'El show debe continuar.- Indie Rocks!', 'Desconocido', '2020-05-27', '23:45:30', 'El Foro Indie Rocks!, en la CDMX, alberga conciertos en vivo a puerta cerrada que, por medio de streaming, pueden presenciarse desde casa.', 14),
(175, 'http://www.reforma.com/suma-apoyos-carta-de-promuseos-a-amlo/ar1952463', 'Suma apoyos carta de ProMuseos a AMLO', 'Desconocido', '2020-05-27', '18:54:15', 'Carta de Frente ProMuseos que pide a AMLO apoyo ante crisis suma 3,700 firmas; Elena Poniatowska y Juan Villoro, entre otros, apoyan misiva.', 14),
(176, 'http://www.reforma.com/pierde-inah-750-mdp-por-medidas-ante-epidemia/ar1952033', 'Pierde INAH 750 mdp por medidas ante epidemia', 'Desconocido', '2020-05-27', '03:57:50', 'Titular del INAH informó que medidas de austeridad ante epidemia de Covid-19 redujeron presupuesto de esa dependencia en 750 mdp para 2020.', 14),
(177, 'http://www.reforma.com/ipstori-viste-violeta/ar1951015', 'Ipstori viste violeta', 'Desconocido', '2020-05-26', '12:01:25', 'Ante aumento de violencia de género durante cuarentena, app de literatura Ipstori se solidariza con antología #ParaLeerLibresDeViolencia.', 14),
(178, 'http://www.reforma.com/conciben-cadaver-exquisito-con-musica/ar1950979', 'Conciben cadáver exquisito con música', 'Desconocido', '2020-05-26', '12:01:25', 'PASAsinCALLE, proyecto que alude a la forma de variación barroca de la pasacalle, se estrenará mañana en El Aleph, festival de la UNAM.', 14),
(179, 'http://www.reforma.com/evocan-al-padre-de-los-burron/ar1950997', 'Evocan al padre de los Burrón', 'Desconocido', '2020-05-26', '01:34:17', 'En el décimo aniversario luctuoso de Gabriel Vargas, la SC puso en línea exposición virtual para recordar al creador de La familia Burrón.', 14),
(180, 'http://www.reforma.com/retratan-confinamiento-a-distancia/ar1950350', 'Retratan confinamiento a distancia', 'Desconocido', '2020-05-25', '12:01:11', 'A través del proyecto Retratos a distancia, Rafael Rosales y Francisco García capturan con drones imágenes de capitalinos en confinamiento.', 14),
(181, 'http://www.reforma.com/reabre-primer-museo-en-eu-tras-crisis-por-covid/ar1949887', 'Reabre primer museo en EU tras crisis por Covid', 'Desconocido', '2020-05-24', '04:08:11', 'Tras casi dos meses en cuarentena, el Museo de Bellas Artes, ubicado en Houston, Texas, reanudó actividades bajo un protocolo riguroso.', 14),
(182, 'http://www.reforma.com/beethoven-gigante-de-la-musica/ar1875735', 'Beethoven: Gigante de la música', 'Desconocido', '2020-02-28', '11:02:34', 'Creador de partituras de extraordinaria belleza, Beethoven celebra el 250 aniversario de su nacimiento; conoce 10 obras para recordarlo.', 14),
(183, 'http://www.reforma.com/semestre-online-y-recortes-asi-la-vida-en-el-cide/ar1952453', 'Semestre online  y recortes, así  la vida en el CIDE', 'Desconocido', '2020-05-27', '18:24:31', 'El CIDE impartirá clases virtuales para el semestre de otoño, así como un recorte del 75% a su presupuesto, según reporte en redes sociales.', 15),
(184, 'http://www.reforma.com/la-unam-te-desafia-haz-ejercicio-en-el-encierro/ar1951720', 'La UNAM  te desafía:  haz ejercicio  en el encierro', 'Desconocido', '2020-05-27', '12:02:34', 'Con transmisiones en vivo, la UNAM invita a participar en la jornada mundial de activación física, a realizarse el 27 de mayo.', 15),
(185, 'http://www.reforma.com/te-gustan-las-novelas-graficas-crea-una-y-gana/ar1951721', '¿Te gustan las novelas gráficas? Crea una y gana', 'Desconocido', '2020-05-26', '22:44:45', 'Con el certamen de novela gráfica Las otras tintas, jóvenes de mínimo 16 años pueden ganar hasta 21 mil pesos y la difusión de su obra.', 15),
(186, 'http://www.reforma.com/aislamiento-social-causa-ansiedad-en-jovenes-uvm/ar1950808', 'Aislamiento social causa ansiedad  en jóvenes.- UVM', 'Desconocido', '2020-05-26', '12:02:28', 'De acuerdo con un análisis de la UVM, el confinamiento social ha causado estrés y ansiedad en los jóvenes menores de 30 años.', 15),
(187, 'http://www.reforma.com/con-ozono-y-luz-evitan-propagacion-de-covid-19/ar1950797', 'Con ozono y luz, evitan propagación  de Covid-19', 'Desconocido', '2020-05-25', '21:28:49', '\"Ozvi\", un dispositivo que emplea ozono y luz ultravioleta para esterilizar superficies, busca evitar la propagación del Covid-19.', 15),
(188, 'http://www.reforma.com/por-virus-ipn-reanudaria-clases-en-septiembre/ar1950757', 'Por virus, IPN reanudaría clases  en septiembre', 'Desconocido', '2020-05-25', '20:43:49', 'El IPN prevé reanudar clases el 7 de septiembre y reincorporar a su planta laboral desde el 1 de ese mes si el riesgo de contagio disminuye.', 15),
(189, 'http://www.reforma.com/acaba-con-el-insomnio-de-cuarentena/ar1948985', 'Acaba con el insomnio de cuarentena', 'Desconocido', '2020-05-25', '17:37:14', '¿Has tenido problemas para dormir durante la contingencia sanitaria del Covid-19? Aquí te decimos por qué sucede y cómo solucionarlo.', 15),
(190, 'http://www.reforma.com/beyonce-gaga-y-maluma-cantan-en-tu-graduacion/ar1948932', 'Beyoncé, Gaga y Maluma cantan  en tu graduación', 'Desconocido', '2020-05-22', '21:15:57', 'Con el evento Dear Class of 2020, artistas y celebridades festejan a los jóvenes que se graduarán durante la pandemia del Covid-19.', 15),
(191, 'http://www.reforma.com/alto-a-la-violencia-dan-asesoria-remota-a-mujeres/ar1948066', 'Alto a la violencia: dan asesoría remota a mujeres', 'Desconocido', '2020-05-22', '12:02:45', 'Con la Red de Acompañamiento en Contingencia de la Universidad Autónoma de Querétaro se busca apoyar a las mujeres legal y psicológicamente.', 15),
(192, 'http://www.reforma.com/anuncia-ibero-plan-de-reapertura-tras-covid-19/ar1947890', 'Anuncia Ibero plan de reapertura  tras Covid-19', 'Desconocido', '2020-05-21', '19:17:27', 'Aunque las clases presenciales se retomarán a partir de otoño en la Ibero, quienes prefieran estudiar vía remota podrán hacerlo.', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id` int(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id`, `nombre`, `subtitulo`, `url`) VALUES
(10, 'Gizmodo en Español', 'Las ultimas noticias en tecnología, ciencia y cultura digital.', 'https://es.gizmodo.com'),
(11, 'Xataka', 'Publicación de noticias sobre gadgets y tecnología. Últimas tecnologías en electrónica de consumo y ', 'http://feeds.weblogssl.com/xataka2.xml'),
(12, 'NYT &gt; Top Stories', '', 'http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml'),
(13, 'reforma.com - deportes', 'Las últimas noticias más relevantes publicadas en reforma.com', 'https://www.reforma.com/rss/deportes.xml'),
(14, 'Reforma', 'Las últimas noticias publicadas más relevantes', 'https://www.reforma.com/rss/cultura.xml'),
(15, 'Reforma', 'Las últimas noticias publicadas más relevantes', 'https://www.reforma.com/rss/universitarios.xml');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagina` (`id_pagina`);
ALTER TABLE `articulo` ADD FULLTEXT KEY `fullqr` (`titulo`,`autor`,`descripcion`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_pagina`) REFERENCES `pagina` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
