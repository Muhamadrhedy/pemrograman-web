<?php
declare(strict_types=1);
final class PenilaianPraktikum extends PenilaianDasar {
    protected function bobot(): array { return [0.6, 0.2, 0.2]; }
}