function validarForm(form) {
    let errors = false;
    form.find('.obrigatorio').each(function() {
        tamanho = $(this).val() == null ? '' : $(this).val();
        tamanho = (Array.isArray(tamanho)) ? tamanho.length : tamanho.trim().length;
        if($(this).hasClass('cnpj')){
            if(!validateCNPJ(this.value)){
                errors = true;
                $(this).addClass('is-invalid');
                $(this).removeClass('is-valid');
            }else{
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
        }else if($(this).hasClass('cep')){
            if($('#logradouro').val().length == 0){
                errors = true;
                $(this).addClass('is-invalid');
                $(this).removeClass('is-valid');
            }else{
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
        }else if($(this).hasClass('senha')){
            if(!validatePassword(this.value)){
                errors = true;
                $(this).addClass('is-invalid');
                $(this).removeClass('is-valid');
            }else{
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
        }else if($(this).hasClass('confirm-password')){
            if(!validateConfirmPassword($('#senha').val(), this.value)){
                errors = true;
            }
        }else if($(this).hasClass('email')){
            if(!validarEmail($(this).val())){
                errors = true;
                $(this).addClass('is-invalid');
            }else{
                $(this).removeClass('is-invalid');
            }
        }else if($(this).hasClass('email-confirmation')){
            if($(this).val() != $('#email').val()){
                errors = true;
                $(this).addClass('is-invalid');
            }else{
                $(this).removeClass('is-invalid');
            }
        }else{
            if(tamanho == 0){
                errors = true;
                $(this).addClass('is-invalid');
            }else{
                $(this).removeClass('is-invalid');
            }
        }
    });

    return errors;
}

function validateCNPJ(cnpj) {
    cnpj = cnpj.replace(/[^\d]+/g, '');
  
    if (cnpj.length !== 14) {
      return false;
    }
  
    // Verifying repeated digits
    if (/^(\d)\1+$/.test(cnpj)) {
      return false;
    }
  
    let sum = 0;
    let multiplier = 2;
  
    for (let i = 11; i >= 0; i--) {
      sum += parseInt(cnpj.charAt(i)) * multiplier;
      multiplier = multiplier === 9 ? 2 : multiplier + 1;
    }
  
    const mod = sum % 11;
    const digit1 = mod < 2 ? 0 : 11 - mod;
  
    if (parseInt(cnpj.charAt(12)) !== digit1) {
      return false;
    }
  
    sum = 0;
    multiplier = 2;
  
    for (let i = 12; i >= 0; i--) {
      sum += parseInt(cnpj.charAt(i)) * multiplier;
      multiplier = multiplier === 9 ? 2 : multiplier + 1;
    }
  
    const digit2 = (sum % 11) < 2 ? 0 : 11 - (sum % 11);
  
    return parseInt(cnpj.charAt(13)) === digit2;
}

function validateCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');
  
    if (cpf.length !== 11 || /^(\d)\1+$/.test(cpf)) {
      return false;
    }
  
    const digits = cpf.split('').map(Number);
  
    // Verificação do primeiro dígito verificador
    let sum = 0;
    for (let i = 0; i < 9; i++) {
      sum += digits[i] * (10 - i);
    }
    let remainder = sum % 11;
    let digit1 = remainder < 2 ? 0 : 11 - remainder;
  
    if (digit1 !== digits[9]) {
      return false;
    }
  
    // Verificação do segundo dígito verificador
    sum = 0;
    for (let i = 0; i < 10; i++) {
      sum += digits[i] * (11 - i);
    }
    remainder = sum % 11;
    let digit2 = remainder < 2 ? 0 : 11 - remainder;
  
    return digit2 === digits[10];
} 

function validatePassword(password) {
    const regex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

    return regex.test(password);
}

function validateConfirmPassword(password, confirmPassword) {
    console.log(password)
    console.log(confirmPassword)
    if(password.length == 0 || confirmPassword.length == 0) return false;
    if(password == confirmPassword){
        $('#confirm-password').removeClass('is-invalid');
        $('#confirm-password').addClass('is-valid');
        return true;
    }

    $('#confirm-password').removeClass('is-valid');
    $('#confirm-password').addClass('is-invalid');

    return false;
}

function validarEmail(email) {
    var regex = /^[a-zA-Z0-9._-]+@etec\.sp\.gov\.br$/;

    return regex.test(email);
}

$(function(){
    $('.send-validation-email').submit(function(e){
        e.preventDefault();
        if(validarForm($(this))){
            return ;
        }
        Swal.fire({
            title: 'Aguarde...'
        });
        Swal.showLoading();

        $.ajax({
            url: this.action,
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(retorno){
                retorno = JSON.parse(retorno);
                console.log(retorno.icon)
                Swal.fire({
                    icon: retorno.icon,
                    title: retorno.title,
                    text: retorno.text,
                });
            }
        });
    });
})