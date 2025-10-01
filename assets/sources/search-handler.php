<?php
if (isset($_GET['q']) && !empty($_GET['q'])) {
    $search_parameter = secureEncode($_GET['q']);
    $search_query = searchGames($search_parameter);

    if ($search_query) {
        foreach ($search_query as $game_search) {
            $get_game_data_search = gameData($game_search);
            $game_url = $get_game_data_search['game_url'];
            $game_image = $get_game_data_search['image_url'];
            $game_name = $get_game_data_search['name'];
            $game_video_url = $get_game_data_search['video_url'];
            $game_featured = $get_game_data_search['featured'];
            $game_icon = ''; // Sesuaikan ini jika Anda punya ikon spesial

            echo "
            <div class='post'>
                <a href='{$game_url}' class='game-item' aria-label='{$game_name}'>
                    <img src='{$game_image}' alt='{$game_name}'>
                    <p class='post-name' data-url='{$game_video_url}' data-scale='1.2' data-translate='-23px,-25px'>{$game_name}</p>
                    {$game_featured}
                    {$game_icon}
                </a>
            </div>";
        }
    } else {
        echo "<p>No games found</p>";
    }
} else {
    echo "<p>Type something to search</p>";
}
