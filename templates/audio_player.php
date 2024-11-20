<? if($args) { ?> <?php
    $audio_file = $args;
    ?>
    <div class="podcast_player ">
        <div class="audio-player" data-source="<?= $audio_file['url']; ?>">
            <div class="controls">
                <div class="play-container">
                    <div class="toggle-play play">
                        <div class="btn_name play">
                            <span class="btn_text_item word_play">PLAY</span>
                            <span class="btn_text_item word_pause">PAUSE</span>
                        </div>
                    </div>
                </div>
                <div class="time">
                    <div class="current">0:00</div>
                    <div class="divider">/</div>
                    <div class="length"></div>
                </div>
                <div class="timeline">
                    <div class="progress"></div>
                </div>
                <div class="volume-container">
                    <div class="volume-slider">
                        <div class="volume-percentage"></div>
                    </div>
                    <div class="volume-button">
                        <div class="volume icono-volumeMedium"></div>
                    </div>
                </div>
                <div class="close_btn"></div>
            </div>

        </div>
        <div class="player_indicator">
            <div class="toggle-play play">
                <div class="btn_name play">
                    <span class="btn_text_item word_play">PLAY</span>
                    <span class="btn_text_item word_pause">PAUSE</span>
                </div>
            </div>
        </div>
    </div>
<? } ?>