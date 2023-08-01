<template>
  <form @submit.prevent="saveContact">
    <div class="form-group">
      <label for="nome_de_contato">Nome de Contato</label>
      <input v-model="form.nome_de_contato" type="text" id="nome_de_contato" name="nome_de_contato" required>
    </div>
    <div class="form-group">
      <label for="email_de_contato">Email de Contato</label>
      <input v-model="form.email_de_contato" type="email" id="email_de_contato" name="email_de_contato" required>
    </div>
    <div class="form-group">
      <label for="telefone_de_contato">Telefone de Contato</label>
      <input v-model="form.telefone_de_contato" type="text" id="telefone_de_contato" name="telefone_de_contato" required>
    </div>
    <div class="form-group">
      <label for="cep">CEP</label>
      <input v-model="form.cep" type="text" id="cep" name="cep" required>
    </div>
    <div class="form-group">
      <label for="estado">Estado</label>
      <input v-model="form.estado" type="text" id="estado" name="estado" required>
    </div>
    <div class="form-group">
      <label for="cidade">Cidade</label>
      <input v-model="form.cidade" type="text" id="cidade" name="cidade" required>
    </div>
    <div class="form-group">
      <label for="bairro">Bairro</label>
      <input v-model="form.bairro" type="text" id="bairro" name="bairro" required>
    </div>
    <div class="form-group">
      <label for="endereco">Endereço</label>
      <input v-model="form.endereco" type="text" id="endereco" name="endereco" required>
    </div>
    <div class="form-group">
      <label for="numero">Número</label>
      <input v-model="form.numero" type="number" id="numero" name="numero" required>
    </div>
    <button type="submit">Salvar</button>
  </form>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      form: {
        nome_de_contato: '',
        email_de_contato: '',
        telefone_de_contato: '',
        cep: '',
        estado: '',
        cidade: '',
        bairro: '',
        endereco: '',
        numero: null,
      }
    };
  },
  methods: {
    saveContact() {
      axios.post('/api/contacts', this.form)
        .then(response => {
          // Lidar com a resposta do backend, se necessário
          console.log(response.data);
          // Por exemplo, redirecionar para a página de listagem de contatos após salvar
          this.$router.push({ name: 'contacts.index' });
        })
        .catch(error => {
          // Lidar com erros, se ocorrerem
          console.error(error);
        });
    }
  }
};
</script>

