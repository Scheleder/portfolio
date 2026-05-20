<?php 
$headerImg = 'contact.png';
require_once 'header.php'; 
?>

<div class="bg-white/60 dark:bg-gray-800/60 backdrop-blur-sm rounded-2xl shadow-xl p-8 md:p-12 transition-all duration-300 mb-10 max-w-4xl mx-auto">
    <div class="text-center mb-10">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white border-b-2 border-primary-dark dark:border-primary-light pb-4 inline-block">Contato</h1> 
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php
        $contacts = [
            ['link' => 'mailto:me@scheleder.com', 'icon' => 'mail-outline', 'label' => 'me@scheleder.com'],
            ['link' => 'https://api.whatsapp.com/send?phone=5541991248571', 'icon' => 'logo-whatsapp', 'label' => '+55 (41) 991 248 571'],
            ['link' => 'https://www.linkedin.com/in/scheleder/', 'icon' => 'logo-linkedin', 'label' => 'Linkedin'],
            ['link' => 'https://play.google.com/store/apps/developer?id=Jo%C3%A3o+Scheleder+Neto', 'icon' => 'logo-google-playstore', 'label' => 'Google Playstore'],
            ['link' => 'https://github.com/Scheleder', 'icon' => 'logo-github', 'label' => 'Github'],
            // ['link' => 'https://www.facebook.com/scheleder', 'icon' => 'logo-facebook', 'label' => 'Facebook'],
            // ['link' => 'https://www.instagram.com/joaoschelederneto/', 'icon' => 'logo-instagram', 'label' => 'Instagram'],
            // ['link' => 'https://www.youtube.com/user/joaoschelederneto/videos', 'icon' => 'logo-youtube', 'label' => 'Youtube'],
            // ['link' => 'https://twitter.com/SchelederNeto', 'icon' => 'logo-twitter', 'label' => 'Twitter'],
            ['link' => 'https://goo.gl/maps/Bw8ops1XhkjBpfh46', 'icon' => 'location-outline', 'label' => 'Colombo/PR']
        ];

        foreach ($contacts as $contact):
        ?>
        <a href="<?= $contact['link'] ?>" target="_blank" class="group flex items-center gap-4 p-4 rounded-xl bg-white dark:bg-gray-700/50 shadow-md hover:bg-primary-light/30 dark:hover:bg-primary-dark/50 border border-gray-100 dark:border-transparent hover:border-primary-dark dark:hover:border-primary-light transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-100 dark:bg-gray-600 text-gray-700 dark:text-gray-300 group-hover:bg-white dark:group-hover:bg-gray-800 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors duration-300">
                <ion-icon name="<?= $contact['icon'] ?>" class="text-2xl"></ion-icon>
            </div>
            <span class="text-lg font-medium text-gray-800 dark:text-gray-200 group-hover:text-primary-dark dark:group-hover:text-primary-light transition-colors duration-300">
                <?= $contact['label'] ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'footer.php'; ?>