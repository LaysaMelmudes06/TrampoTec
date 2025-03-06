<?php

// Aplicando validação de telefone
function formatPhoneNumber($phoneNumber)
{
  // Remover todos os caracteres que não são dígitos
  $cleanedNumber = preg_replace('/\D/', '', $phoneNumber);

  // Verificar se o número tem o tamanho correto para um número de celular
  if (strlen($cleanedNumber) == 11) {
    // Aplicar a máscara: (xx) xxxx-xxxx
    $formattedNumber = sprintf(
      "(%s) %s-%s",
      substr($cleanedNumber, 0, 2),
      substr($cleanedNumber, 2, 4),
      substr($cleanedNumber, 6)
    );

    return $formattedNumber;
  } else {
    // Caso o número não tenha o tamanho esperado
    return false;
  }
}

// Aplicando senha forte
function isStrongPassword($password)
{
  // Pelo menos 8 caracteres
  if (strlen($password) > 8) {
    return false;
  }

  // Pelo menos uma letra maiúscula
  if (!preg_match('/[A-Z]/', $password)) {
    return false;
  }

  // Pelo menos uma letra minúscula
  if (!preg_match('/[a-z]/', $password)) {
    return false;
  }

  // Pelo menos um dígito numérico
  if (!preg_match('/[0-9]/', $password)) {
    return false;
  }

  // Pelo menos um caractere especial
  if (!preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password)) {
    return false;
  }

  return true;
}

// Verificar se as senhas sao iguais 
function senhasIguais($senha , $repetirSenha){
    if($senha != $repetirSenha){
        return false;
    }
    return true;
}

function validarCPF($cpf) {
    // Remove caracteres não numéricos do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    // Verifica se o CPF tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }
    
    // Verifica se todos os dígitos são iguais (CPF inválido)
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }
    
    // Calcula o primeiro dígito verificador
    $soma = 0;
    for ($i = 0; $i < 9; $i++) {
        $soma += (int)$cpf[$i] * (10 - $i);
    }
    $resto = $soma % 11;
    $digito1 = ($resto < 2) ? 0 : 11 - $resto;
    
    // Calcula o segundo dígito verificador
    $soma = 0;
    for ($i = 0; $i < 10; $i++) {
        $soma += (int)$cpf[$i] * (11 - $i);
    }
    $resto = $soma % 11;
    $digito2 = ($resto < 2) ? 0 : 11 - $resto;
    
    // Verifica se os dígitos calculados são iguais aos dígitos informados
    if ($cpf[9] != $digito1 || $cpf[10] != $digito2) {
        return false;
    }
    
    return true;
}

function formatarCPF($cpf) {
    // Remove caracteres não numéricos do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    // Adiciona a máscara ao CPF
    return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
}



?>