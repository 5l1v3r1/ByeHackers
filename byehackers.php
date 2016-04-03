<?php 
	
	/*
		ByeHackers PHP Script v2
		Coded by João Artur (K3N1)
		www.youtube.com/c/KeniGamer
	*/



	/* Start anti sqlinjection */
		function antisqlinjection($variavel) {
			return str_replace(array("'","\\"), "", $variavel);
		}
	/* End anti sqlinjection */



	/* Start anti xss */
		function antixss($variavel) {
			return strip_tags($variavel);
		}
	/* End anti xss */



	/* Start anti lfd */
		function antilfd($variavel) {
			$blocked = array(".php",".aspx",".asp",".html");
			$allowed = array(".pdf",".jpg",".gif",".png");

			if (strpos($blocked, $variavel)) {
				echo "Esse tipo de arquivo não é permitido.";
				return false;
			} else if (strpos($allowed, $variavel)) {
				return true;
			}
		}
	/* End anti lfd */


	/* Start anti lfi */
		function antilfi($variavel) {
			return str_replace(array("/var","/user","/home","/self","/proc","/environ"), "", $variavel);
		}
	/* End anti lfi */



	/* Start anti rfi */
		function antirfi($variavel) {
			return str_replace(array(".php",".asp",".aspx",".txt"), "", $variavel);
		}
	/* End anti rfi */



	/* Start anti php cgi argument insertion */
		if (isset($_GET['-s'])) {
			echo "Tentativa de PHP CGI ARGUMENT INSERTION.<br>Seu IP: ".$_SERVER['REMOTE_ADDR'];
			return false;
		}
	/* End anti php cgi argument insertion */



	/* Start IP Logger */
		$ip = $_SERVER['REMOTE_ADDR'];
		$arquivo = "ips.html";
		$acesso = date("H:i:s");
		$conteudo = file_get_contents($arquivo);
		if ($conteudo == "") {
			file_put_contents($arquivo, '
					<table>
						<tr>
							<th>Endereço IP</th>
							<th>Horário do acesso</th>
						</tr>
						<tr>
							<td>'.$ip.'</td>
							<td>'.$acesso.'</td>
						</tr>
				');
		} else {
			file_put_contents($arquivo, $conteudo.'
						<tr>
							<td>'.$ip.'</td>
							<td>'.$acesso.'</td>
						</tr>
				');
		}
	/* End IP Logger */
?>