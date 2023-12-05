<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            いま、旅に出よう
        </h2>
    </x-slot>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url('/images/bg_travel.jpeg');">
                <div class="swiper-text">
                    <h2 class="text-3xl font-semibold text-white">旅のしおりを作成しよう</h2>
                    <h3 class="text-3xl font-semibold text-white">旅行のしおり、予定表、計画を誰でも簡単に作れる無料のサービス「torapura」<br>しおりをメンバーと共有できます</h3>
                </div>
            </div>
            <div class="swiper-slide relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url('/images/cadini.jpeg');">
                <div class="swiper-text">
                    <h2 class="text-3xl font-semibold text-white">旅のしおりを作成しよう</h2>
                    <h3 class="text-3xl font-semibold text-white">旅行のしおり、予定表、計画を誰でも簡単に作れる無料のサービス「torapura」<br>しおりをメンバーと共有できます</h3>
                </div>
            </div>
            <div class="swiper-slide relative min-h-screen flex items-center justify-center bg-cover bg-center bg-no-repeat" style="background-image: url('/images/taj-mahal.jpeg');">
                <div class="swiper-text">
                    <h2 class="text-3xl font-semibold text-white">旅のしおりを作成しよう</h2>
                    <h3 class="text-3xl font-semibold text-white">旅行のしおり、予定表、計画を誰でも簡単に作れる無料のサービス「torapura」<br>しおりをメンバーと共有できます</h3>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.swiper-container', {
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                speed: 3000,
            });
        });
    </script>
</x-app-layout>
