<div class="px-md-0">

<div  id="fade" class="hide">
          <div id="loader" class="spinner-border hide"  role="status" >

          </div>      
    </div>

    

<a class="link" href="?pg=home"><i class="fa-solid fa-arrow-left mb-3"></i></a>
    <h2 class="mb-4">Faça sua denúncia de alagamento</h2>

        <form id="contactForm" action="?pg=registrardb" method="post" enctype="multipart/form-data"> 

                <label for="nome" class="p-0">Nome <i class="fa-solid fa-asterisk"></i>:</label>
                <input type="text" class="form-control" name="nome" id="name" required="" data-validation-required-message="Por favor, insira seu nome." placeholder="Digite seu nome">

                <div id="divNome">

                </div>
            

            <label for="cep">CEP <i class="fa-solid fa-asterisk"></i> :</label>
            <input type="text" class="form-control-sm" name="cep" id="cep" placeholder="Digite o CEP" data-input minlength="8" maxlength="8" required>
            
            <br>


            <div id="error">

            </div>    

            <div id="resultado">


            </div>

            <label for="intensidade" class="pt-3">Intensidade <i class="fa-solid fa-asterisk"></i> :</label>
            <select name="intensidade" class="form-select-sm" required>
            <option value="">Selecione</option>
            <option value="leve">Leve</option>
            <option value="moderado">Moderado</option>
            <option value="grave">Grave</option>
            </select>
            
            <label for="classificacao">Classificação <i class="fa-solid fa-asterisk"></i> :</label>
            <select name="classificacao" class="form-select-sm" required>
            <option value="">Selecione</option>
            <option value="localizado">Localizado</option>
            <option value="intransitável">Intransitável</option>
            </select>

            <br>

            
            <label class="form-label">Escolha até 2 imagens(Opcional):</label>
            <input class="form-control" id="imageInput" type="file" name="fotos[]" accept="image/*" multiple>
            
            <div id="imageDiv">

            </div>

            <br>

            <label>Mensagem(Opcional):</label>
            <textarea name="mensagem" id="mensagem" class="form-control" cols="7" rows="4" placeholder="Insira uma mensagem"></textarea>
            
            <br>

            <button type="submit" class="btn" id="submitButton">Registrar ocorrência</button>

        </form>



</div>

