const name = document.querySelector("#name")
const divNome = document.querySelector("#divNome")

const form = document.querySelector('#contactForm')
const submitButton = document.querySelector("#submitButton")

const cepInput = document.querySelector('#cep')
const rua = document.querySelector('#logradouro')
const bairro = document.querySelector('#bairro')
const localidade = document.querySelector('#localiadde')
const uf = document.querySelector('#uf')
const complemento = document.querySelector('#complemento')

let crtlV = false
const messageResult = document.querySelector("#resultado")
const divErro = document.querySelector('#error')

// const formInputs = document.querySelector('#[data-input]')

//Apenas permitir letras e acentos no input de nome
$("#name").keypress(function(press) {
    let keyCode = (press.keyCode ? press.keyCode : press.which);
    if (keyCode >= 33 && keyCode <= 64 || keyCode>=91 && keyCode <=96 || keyCode>=123) {
      press.preventDefault();
    }
  });

  function validateNameInput() {
  
    //Nome de usuário 
    if(name.value.trim()==="") {
        scrollTop()
        divNome.innerHTML = "<p class='alert alert-danger mt-3' role='alert'><small>O nome não pode ser vazio.</small></p>"
        return false
        
    } else {
        divNome.innerHTML = ''
        return true
    }

}

cepInput.addEventListener('paste', ()=>{
    crtlV = true
})

cepInput.addEventListener('keypress', (e)=> {
    const onlyNumbers = /[0-9]/
    const key = String.fromCharCode(e.keyCode)

    if(!onlyNumbers.test(key)) {
        e.preventDefault()
        return
    } else {
        crtlV = false
        divErro.innerHTML = ''
    }
})

cepInput.addEventListener('keyup', (e)=> {
    const inputValue = e.target.value
    messageResult.innerHTML = ''
    messageResult.classList.remove('result')

    //SEARCH RETORNA -1 QUANDO NAO ENCONTRA
    let caractere = inputValue.search(/\W|_|-/)
    let letra = inputValue.search(/[A-z]/)
    let numero = inputValue.search(/[0-9]/)
    let campoVazio = inputValue==''
    console.log(campoVazio)
    // console.log(caractere)
    // console.log(letra)
    // console.log(numero)
    
   if(numero!==-1 && letra!==-1 || caractere!==-1) {
    cepInputErrorMessage()
   }
   if(numero===-1 && letra===-1 || caractere===-1) {
     if(inputValue.length === 8) {
        buscaCep(inputValue)
     }
   }
    
   
})

const buscaCep = async (cep) => {
    toggleLoader()
    
    cepInput.blur()

    const apiUrl = `https://viacep.com.br/ws/${cep}/json/`

    const response = await fetch(apiUrl)

    const data = await response.json()

    if(data.erro==true) {
        cepInput.value = ''
        messageResult.innerHTML = ''
        messageResult.classList.remove('result')
        toggleLoader()
        toggleMessage("CEP inválido. Por favor, verifique e tente novamente.")
        return
    }

    divErro.innerHTML = ''

    toggleLoader()

    messageResult.classList.add('result')

    messageResult.innerHTML = ''

    messageResult.innerHTML += `<label>Rua <i class="fa-solid fa-asterisk"></i> :</label><input type="text" class="form-control" name="logradouro" id='logradouro' required data-input value="${data.logradouro}">`

    messageResult.innerHTML += `<label>Bairro <i class="fa-solid fa-asterisk"></i> :</label><input type="text" class="form-control" name="bairro" id='bairro' required data-input value="${data.bairro}">`

    messageResult.innerHTML += `<label>Localidade <i class="fa-solid fa-asterisk"></i> :</label><input type="text" class="form-control" name="localidade" id='localidade' required data-input value="${data.localidade}">`

    messageResult.innerHTML += `<label>UF <i class="fa-solid fa-asterisk"></i> :</label><input type="text" class="form-control" name="uf" id='uf' required data-input value="${data.uf}">`

    messageResult.innerHTML += `<label>Ponto de Referência <i class="fa-solid fa-asterisk"></i> :</label><input type="text" class="form-control" name="complemento" id='complemento' required data-input value="${data.complemento}">`

}

form.addEventListener('submit', (e)=> {
    
    if(validateNameInput()==false){
        e.preventDefault()
    }
})

const toggleLoader = () => {
    const fadeElement = document.querySelector('#fade')
    const spinner = document.querySelector('#loader')

    fadeElement.classList.toggle("hide")
    spinner.classList.toggle("hide")
}

const toggleMessage = (msg) => {

    divErro.innerHTML = `<p class='alert alert-danger mt-3' role='alert'><small>${msg}</small></p>`

}

function cepInputErrorMessage() {
    cepInput.value = ''
    toggleMessage('Não copie texto com letras ou símbolos.')
    return
}

function scrollTop() {   
    window.scrollTo({ top: 0, behavior: 'smooth' })
}
