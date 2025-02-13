<div class="bg-gradient-to-br from-purple-100 to-indigo-200  flex items-center justify-center px-4 py-10">

    <div class="container">

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden max-w-4xl w-full mx-auto">
            <div class="md:flex">
                <!-- Section pour les abonnés -->

                <?php if($hasSubscribeNewsLetter): ?>
                <div id="alreadySubscribedSection" class="md:w-1/2 p-8 bg-indigo-700 text-white">
                    <h2 class="text-3xl font-bold mb-4">Merci pour votre fidélité !</h2>
                    <p class="mb-6">Vous êtes déjà abonné à notre newsletter. Continuez à profiter de nos contenus exclusifs.</p>
                    <div class="text-center">
                        <form onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')" action="<?php echo e(route('news-letter.remove')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <button id="unsubscribeButton" class="bg-white text-indigo-700 font-semibold py-2 px-6 rounded-lg hover:bg-indigo-100 transition duration-300">
                                Se désabonner
                            </button>
                        </form>
                    </div>
                </div>
                <?php else: ?>
                <!-- Section d'inscription -->

                <div id="subscribeSection" class="md:w-1/2 p-8 fade-in">
                    <h2 class="text-3xl font-bold text-indigo-800 mb-4">Restez inspiré</h2>
                    <p class="text-gray-600 mb-6">Rejoignez notre newsletter pour recevoir les dernières tendances et idées créatives.</p>
                    <form onsubmit="return confirm('Voulez-vous vraiment effectuer cette action ?')" id="subscribeForm" class="space-y-4" action="<?php echo e(route('news-letter.add')); ?>" method="post">
                        <input type="email" placeholder="Votre adresse email" required
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition duration-300" value="<?php echo e(Auth::user()->email); ?>">
                        <?php echo csrf_field(); ?>
                        <button type="submit"
                            class="w-full bg-indigo-600 text-white font-semibold py-3 px-6 rounded-lg hover:bg-indigo-700 transition duration-300 transform hover:scale-105">
                            S'abonner
                        </button>
                    </form>
                    <p class="text-xs text-gray-500 mt-4 text-center">
                        Nous respectons votre vie privée. Désabonnez-vous à tout moment.
                    </p>
                </div>
                <?php endif; ?>



                <!-- Image décorative -->
                <div class="md:w-1/2 bg-cover bg-center hidden md:block" style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=1352&q=80');">
                </div>
            </div>
        </div>
        <!--
    <script>
        const subscribeForm = document.getElementById('subscribeForm');
        const subscribeSection = document.getElementById('subscribeSection');
        const alreadySubscribedSection = document.getElementById('alreadySubscribedSection');
        const unsubscribeButton = document.getElementById('unsubscribeButton');

        subscribeForm.addEventListener('submit', (e) => {
            e.preventDefault();
            // Ici, vous ajouteriez normalement la logique pour envoyer l'email au serveur
            showAlreadySubscribedSection();
        });

        unsubscribeButton.addEventListener('click', () => {
            // Ici, vous ajouteriez normalement la logique pour désabonner l'utilisateur
            showSubscribeSection();
        });

        function showAlreadySubscribedSection() {
            subscribeSection.classList.add('hidden');
            alreadySubscribedSection.classList.remove('hidden');
        }

        function showSubscribeSection() {
            alreadySubscribedSection.classList.add('hidden');
            subscribeSection.classList.remove('hidden');
        }

        // Uncomment the line below to show the "already subscribed" section by default
        // showAlreadySubscribedSection();
    </script> -->
    </div>
</div>

</div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/welcome/_new-letter.blade.php ENDPATH**/ ?>