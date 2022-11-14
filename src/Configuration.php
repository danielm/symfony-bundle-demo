<?php

namespace Danielm\DemoBundle;

final class Configuration {
    public function __construct(
        private readonly int     $required_number_value,
        private readonly ?string $optional_value,
        private readonly ?string $env_value,
        private readonly ?string $secret_value
    ) { }

    public function getRequiredNumberValue(): int {
        return $this->required_number_value;
    }

    public function getOptionalValue(): ?string {
        return $this->optional_value;
    }

    public function getEnvValue(): string {
        return $this->env_value;
    }

    public function getSecretValue(): ?string {
        return $this->secret_value;
    }
}
