    </main>

    <!-- Modal Genérico para Experiência e Projetos -->
    <div id="genericModal" class="fixed inset-0 z-[100] hidden flex items-center justify-center bg-black/60 backdrop-blur-sm transition-opacity duration-300 opacity-0 px-4">
        <div class="bg-white dark:bg-gray-800 w-full max-w-2xl rounded-2xl shadow-2xl p-6 md:p-8 transform scale-95 transition-transform duration-300 overflow-y-auto max-h-[90vh] border border-gray-100 dark:border-gray-700">
            <div class="flex justify-between items-start mb-6">
                <h3 id="modalTitle" class="text-2xl font-bold text-gray-900 dark:text-white pr-4 leading-tight"></h3>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-full p-1 flex items-center justify-center">
                    <ion-icon name="close" class="text-2xl"></ion-icon>
                </button>
            </div>
            <div id="modalContent" class="text-gray-700 dark:text-gray-300 space-y-4">
                <!-- Conteúdo Dinâmico -->
            </div>
        </div>
    </div>

    <footer class="absolute bottom-0 w-full h-16 flex items-center justify-center text-gray-600 dark:text-gray-400 bg-white/50 dark:bg-gray-900/50 backdrop-blur-sm border-t border-gray-200 dark:border-gray-800 transition-colors duration-500">
        <a href="contact.php" class="hover:text-primary-dark dark:hover:text-primary-light transition-colors duration-300">
            <p class="font-medium text-sm">João Scheleder Neto &copy; <?= date('Y') ?></p>
        </a>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        // Mobile Menu Toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }
    </script>
</body>
</html>
