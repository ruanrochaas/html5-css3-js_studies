 <?php
$date = date("d/m/Y h:i");

// ****** ATEN��O ********
// ABAIXO EST� A CONFIGURA��O DO SEU FORMUL�RIO.
// ****** ATEN��O ********

// RECEBE OS VALORES VINDO DO FORMUL�RIO E ATRIBUI AS VARI�VEIS
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

//CABE�ALHO - ONFIGURA��ES SOBRE SEUS DADOS E SEU WEBSITE
$nome_do_site="Run's Place";
$email_para_onde_vai_a_mensagem = "ruan_souza30@hotmail.com";
$nome_de_quem_recebe_a_mensagem = "Ruan";
$exibir_apos_enviar='index.html';

//MAIS - CONFIGURA�OES DA MENSAGEM ORIGINAL
$cabecalho_da_mensagem_original="De: $nome <$email>\n";
$assunto_da_mensagem_original="Contato do Site";

// FORMA COMO RECEBER� O E-MAIL (FORMUL�RIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARI�VEL ABAIXO *************
$configuracao_da_mensagem_original="

ENVIADO POR:\n
Nome: $nome\n
Email: $email\n
Assunto: $assunto\n
Mensagem: $mensagem\n
ENVIADO EM: $date

";

//CONFIGURA��ES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
// "Re: $assunto"
$assunto_da_mensagem_de_resposta = "Confirma��o Entrega";
$cabecalho_da_mensagem_de_resposta = "De: $nome_do_site < $email_para_onde_vai_a_mensagem>\n";
$configuracao_da_mensagem_de_resposta="Obrigado por entrar em contato!\nEstaremos respondendo em breve...\nAtenciosamente,\n$nome_do_site\n\nEnviado em: $date";

// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE N�O ALTERE O SCRIPT PARA QUE O SISTEMA FINCIONE CORRETAMENTE
// ****** IMPORTANTE ********

//ESSA VARIAVEL DEFINE SE � O USUARIO QUEM DIGITA O ASSUNTO OU SE DEVE ASSUMIR O ASSUNTO DEFINIDO
//POR VOC� CASO O USUARIO DEFINA O ASSUNTO PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME
//'assunto' NO FORMULARIO DE ENVIO
$assunto_digitado_pelo_usuario="s";

//ENVIO DA MENSAGEM ORIGINAL
$headers = "$cabecalho_da_mensagem_original";

if($assunto_digitado_pelo_usuario=="n"){
$assunto = "$assunto_da_mensagem_original";
}
$seuemail = "$email_para_onde_vai_a_mensagem";
$mensagem = "$configuracao_da_mensagem_original";
mail($seuemail,$assunto,$mensagem,$headers);

//ENVIO DE MENSAGEM DE RESPOSTA AUTOMATICA
$headers = "$cabecalho_da_mensagem_de_resposta";
if($assunto_digitado_pelo_usuario=="n"){
$assunto = "$assunto_da_mensagem_de_resposta";
}else{
$assunto = "Re: $assunto";
}

$mensagem = "$configuracao_da_mensagem_de_resposta";
mail($email,$assunto,$mensagem,$headers);
echo "<script>window.location='$exibir_apos_enviar'</script>";

?>