<template>
    <div>
        <!-- Pokemon List -->
        <div class="pokemon-container">
            <div v-for="pokemon in this.pokemons" :key="pokemon.id">
                <div class="pokemon-card" v-on:click="openPokemonModal(pokemon)">
                    <div class="pokemon-card-type">{{ pokemon.type1 }}</div>
                    <div class="pokemon-card-image">
                        <img v-bind:src="pokemon.png" class="pokemon-card-png" v-bind:alt="pokemon.name + ' photo'">
                        <img v-bind:src="pokemon.gif" class="pokemon-card-gif" v-bind:alt="pokemon.name + ' gif photo'">
                    </div>

                    <h4>{{ pokemon.name }}</h4>
                    <div class="pokemon-card-hp progress">
                        <div class="progress-bar" role="progressbar" v-bind:style="{ width: pokemon.hp + '%' }" v-bind:aria-valuenow="pokemon.hp" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pokemon Modal -->
        <div class="modal" id="pokemon-modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase">Catch this Pokemon!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3 text-center">
                                <img v-bind:src="pokemonModal.gif" class="img-fluid" v-bind:alt="pokemonModal.name + ' gif photo'">

                            </div>
                            <div class="col-9">
                                <h3>{{ pokemonModal.name }}</h3>
                                <p>{{ pokemonModal.description }}</p>

                                <div class="pokemon-modal-types">
                                    <div>
                                        <img 
                                            class="img-fluid" 
                                            v-if="pokemonModal.type1 !== undefined && pokemonModal.type1 !== ''"
                                            v-bind:src="'/assets/icons/ico_' + pokemonModal.type1.toLowerCase() + '.png' " 
                                            v-bind:alt="pokemonModal.name + ' type 1 photo'">
                                        <span v-bind:class="'pokemon-modal-color-' + pokemonModal.type1.toLowerCase()">{{ pokemonModal.type1 }}</span>
                                    </div>
                                    <div>
                                        <img 
                                            class="img-fluid" 
                                            v-if="pokemonModal.type2 !== undefined && pokemonModal.type2 !== ''"
                                            v-bind:src="'/assets/icons/ico_' + pokemonModal.type2.toLowerCase() + '.png' " 
                                            v-bind:alt="pokemonModal.name + ' type 2 photo'">
                                        <span v-bind:class="'pokemon-modal-color-' + pokemonModal.type2.toLowerCase()">{{ pokemonModal.type2 }}</span>
                                    </div>
                                </div>

                                <div class="pokemon-modal-stats">

                                    <div class="row">
                                        <div class="col-4">HP</div>
                                        <div class="col-8">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" v-bind:style="{ width: pokemonModal.hp + '%' }" v-bind:aria-valuenow="pokemonModal.hp" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">Attack</div>
                                        <div class="col-8">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" v-bind:style="{ width: pokemonModal.attack + '%' }" v-bind:aria-valuenow="pokemonModal.attack" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">Defense</div>
                                        <div class="col-8">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" v-bind:style="{ width: pokemonModal.defense + '%' }" v-bind:aria-valuenow="pokemonModal.defense" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">Speed</div>
                                        <div class="col-8">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" v-bind:style="{ width: pokemonModal.speed + '%' }" v-bind:aria-valuenow="pokemonModal.speed" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-4">Special</div>
                                        <div class="col-8">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" v-bind:style="{ width: pokemonModal.special + '%' }" v-bind:aria-valuenow="pokemonModal.special" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-primary float-right mt-4"
                            v-if="haveCatched === undefined || haveCatched === false"
                            v-on:click="onClickCatchPokemon(pokemonModal, $event)">Catch pokemon</button>
                        
                        <button type="button" class="btn btn-primary float-right mt-4"
                            v-if="haveCatched !== undefined && haveCatched === true"
                            v-on:click="onClickReleasePokemon(pokemonModal, $event)">Release pokemon</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['pokemon-inventory', 'have-catched'],
        mounted() {
            // Seems pointless, but it's so I can control the state later on.
            this.pokemons = this.pokemonInventory;
        },


        data: function() {
            // Set default values, to avoid errors and cool animations.
            return { 
                pokemonModal: {
                    type1: '',
                    type2: '',
                    hp: 0,
                    attack: 0,
                    defense: 0,
                    speed: 0,
                    special: 0
                },
                pokemons: []
            }
        },
        methods: {
            // Show correct pokemon on card click and open modal.
            openPokemonModal: function(pokemon) {
                this.pokemonModal = pokemon

                $('#pokemon-modal').modal('show'); 
            },

            // Create a relation between the logged user and the clicked pokemon.
            onClickCatchPokemon: function(pokemonModal, e) {
                let button = e.target;

                // Disable the button and show feedback.
                button.disabled = true
                button.innerHTML = "Catching pokemon..."

                // Call pokemon controller.
                axios.post('/pokemon/catch', {
                    pokemonModal: pokemonModal
                })
                .then(res => {
                    // Show success notification.
                    new Noty({
                        type: 'success',
                        text: 'Pokemon successfully added to inventory.',
                        timeout: 1000
                    }).show();

                    // Hide modal.
                    $('#pokemon-modal').modal('hide');

                    button.disabled = false
                    button.innerHTML = "Catch pokemon"
                })
                .catch(err => {
                    console.log(err)
                })
            },

            // Create a relation between the logged user and the clicked pokemon.
            onClickReleasePokemon: function(pokemonModal, e) {
                let button = e.target;

                // Disable the button and show feedback.
                button.disabled = true
                button.innerHTML = "Releasing pokemon..."

                axios.post('/pokemon/release', {
                    pokemonModal: pokemonModal
                })
                .then(res => {

                    // Show success notification.
                    new Noty({
                        type: 'success',
                        text: 'Pokemon successfully removed from inventory.',
                        timeout: 1000
                    }).show();

                    // Hide modal.
                    $('#pokemon-modal').modal('hide');

                    // Remove pokemon from array.
                    this.pokemons = this.pokemons.filter(p => p.relation_id != pokemonModal.relation_id)

                    button.disabled = false
                    button.innerHTML = "Release pokemon"
                })
                .catch(err => {
                    console.log(err)
                })
            },

            // Update the inventory list.
            updateInventory: function() {
            }
        }
    }
</script>
