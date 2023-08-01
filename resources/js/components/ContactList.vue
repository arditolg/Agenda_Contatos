<template>
  <div>
    <div v-for="contact in contacts" :key="contact.id">
      <h3>{{ contact.nome_de_contato }}</h3>
      <p>Email: {{ contact.email_de_contato }}</p>
      <p>Telefone: {{ contact.telefone_de_contato }}</p>
      <p>CEP: {{ contact.cep }}</p>
      <p>Estado: {{ contact.estado }}</p>
      <p>Cidade: {{ contact.cidade }}</p>
      <p>Bairro: {{ contact.bairro }}</p>
      <p>Endereço: {{ contact.endereco }}, {{ contact.numero }}</p>
      <!-- Adicione outras informações do contato, se necessário -->
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      contacts: []
    };
  },
  mounted() {
    this.loadContacts();
  },
  methods: {
    loadContacts() {
      axios.get('/api/contacts')
        .then(response => {
          this.contacts = response.data;
        })
        .catch(error => {
          console.error(error);
        });
    }
  }
};
</script>

