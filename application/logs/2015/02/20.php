<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-02-20 01:21:50 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Kohana_Arr::get(), called in /home/v/valdic/valdic.bget.ru/public_html/application/classes/Controller/Grid.php on line 40 and defined ~ SYSPATH/classes/Kohana/Arr.php [ 280 ] in /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Arr.php:280
2015-02-20 01:21:50 --- DEBUG: #0 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Arr.php(280): Kohana_Core::error_handler(2, 'Missing argumen...', '/home/v/valdic/...', 280, Array)
#1 /home/v/valdic/valdic.bget.ru/public_html/application/classes/Controller/Grid.php(40): Kohana_Arr::get(Array)
#2 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Controller.php(84): Controller_Grid->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Grid))
#5 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/v/valdic/valdic.bget.ru/public_html/index.php(118): Kohana_Request->execute()
#8 {main} in /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Arr.php:280
2015-02-20 01:24:18 --- EMERGENCY: ErrorException [ 2 ]: json_decode() expects parameter 1 to be string, array given ~ APPPATH/classes/Controller/Grid.php [ 44 ] in file:line
2015-02-20 01:24:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'json_decode() e...', '/home/v/valdic/...', 44, Array)
#1 /home/v/valdic/valdic.bget.ru/public_html/application/classes/Controller/Grid.php(44): json_decode(Array, true)
#2 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Controller.php(84): Controller_Grid->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Grid))
#5 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/v/valdic/valdic.bget.ru/public_html/index.php(118): Kohana_Request->execute()
#8 {main} in file:line
2015-02-20 01:24:31 --- EMERGENCY: ErrorException [ 2 ]: json_decode() expects parameter 1 to be string, array given ~ APPPATH/classes/Controller/Grid.php [ 44 ] in file:line
2015-02-20 01:24:31 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(2, 'json_decode() e...', '/home/v/valdic/...', 44, Array)
#1 /home/v/valdic/valdic.bget.ru/public_html/application/classes/Controller/Grid.php(44): json_decode(Array, true)
#2 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Controller.php(84): Controller_Grid->action_update()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Grid))
#5 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/v/valdic/valdic.bget.ru/public_html/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/v/valdic/valdic.bget.ru/public_html/index.php(118): Kohana_Request->execute()
#8 {main} in file:line