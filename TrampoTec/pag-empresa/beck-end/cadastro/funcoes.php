<?php

// Validar numero de CNPJ
function validar_cnpj($cnpj)
{

  // Verificar se foi informado
  if (empty($cnpj))
    return false;

  // Remover caracteres especias
  $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

  // Verifica se o numero de digitos informados
  if (strlen($cnpj) != 14)
    return false;

  // Verifica se todos os digitos são iguais
  if (preg_match('/(\d)\1{13}/', $cnpj))
    return false;

  $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

  for ($i = 0, $n = 0; $i < 12; $n += $cnpj[$i] * $b[++$i])
    ;

  if ($cnpj[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
    return false;
  }

  for ($i = 0, $n = 0; $i <= 12; $n += $cnpj[$i] * $b[$i++])
    ;

  if ($cnpj[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
    return false;
  }

  return true;
}


// Aplicando mascara no cnpj
function formatCNPJ($cnpj)
{
  $cnpj = preg_replace('/\D/', '', $cnpj); // Remove caracteres não numéricos
  $mask = '##.###.###/####-##';

  $cnpjFormatted = '';
  $j = 0;

  for ($i = 0; $i < strlen($mask); $i++) {
    if ($mask[$i] === '#') {
      $cnpjFormatted .= $cnpj[$j];
      $j++;
    } else {
      $cnpjFormatted .= $mask[$i];
    }
  }

  return $cnpjFormatted;
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








?>