<?php
    
    $objPass=new \Classes\ClassPassword();
    $filter = new \Classes\ClassAuxilia();

    /*============ POST & GET CADASTRO DE USUÁRIO DB account ===================*/
    //Acao do button
    if(isset($_POST['Acao'])){ $Acao=filter_input(INPUT_POST,'Acao',FILTER_SANITIZE_SPECIAL_CHARS); }
    elseif(isset($_GET['Acao'])){ $Acao=filter_input(INPUT_GET,'Acao',FILTER_SANITIZE_SPECIAL_CHARS); }
    else{ $Acao=""; }
    
    //id db account
    if(isset($_POST['id'])){ $Id=filter_input(INPUT_POST,'id',FILTER_SANITIZE_SPECIAL_CHARS); }
    elseif(isset($_GET['id'])){ $Id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS); }
    else{ $Id=0; }

    //nome db account
    if(isset($_POST['nome'])){$nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS);}
    elseif(isset($_GET['nome'])){$nome=filter_input(INPUT_GET,'nome',FILTER_SANITIZE_SPECIAL_CHARS);}
    else{ $nome="";}
    $Nome=$filter->filterVariavel($nome);
    

    //email db account
    if(isset($_POST['email'])){ $Email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL); }
    elseif(isset($_GET['email'])){ $Email=filter_input(INPUT_GET,'email',FILTER_VALIDATE_EMAIL);  }
    else{ $Email=""; }

    //contato  db account      
    if(isset($_POST['contato'])){ $contato=filter_input(INPUT_POST,'contato',FILTER_SANITIZE_NUMBER_INT); }
    elseif(isset($_GET['contato'])){ $contato=filter_input(INPUT_GET,'contato',FILTER_SANITIZE_NUMBER_INT); }
    else{ $contato=""; }
    $Contato =$filter->filterContact($contato);
 
    // Senha e senhaConf db account
    if(isset($_POST['senha'])){  $senha=$_POST['senha'];  $hashSenha=$objPass->passwordHash($senha);  }
    else{  $senha=null; $hashSenha=null;   }
    if(isset($_POST['senhaConf'])){  $senhaConf=$_POST['senhaConf'];  }
    else{ $senhaConf=null;  }
 
    //Esqueci minha senha - Recuperação db account e db confimation
    $token=bin2hex(random_bytes(64));
    if(isset($_POST['token'])){   $token=$_POST['token'];    }
    else{ $token=bin2hex(random_bytes(64));  }

    // Array dos POST e GET
    $arrayVar=[
        "nome"     =>$Nome,
        "email"    =>$Email,
        "contato"  =>$Contato,
        "senha"    =>$senha,
        "hashSenha"=>$hashSenha,
        "token"    =>$token
    ];
   
    

    