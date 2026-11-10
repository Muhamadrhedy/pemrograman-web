<?php
declare(strict_types=1);
final class PenilaianReguler extends PenilaianDasar {
    protected function bobot(): array { return [0.4, 0.3, 0.3]; }
}