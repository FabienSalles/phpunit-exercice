# PHPUnit Exercice — Formation jour 1

Exercices pratiques du premier jour de la formation PHPUnit.

## Prérequis

- PHP ≥ 8.2 avec extensions `bcmath`, `mbstring`, `zip`
- Composer

## Installation

```bash
make install
```

## Lancer les tests

```bash
make tests                                 # tous les tests
vendor/bin/phpunit --filter testNomDuTest  # un test précis
```

## Exercices et branches de correction

La branche `main` ne contient que le scaffold (composer, CI, config). Chaque branche solution apporte les classes et tests propres à son exercice.

| Exercice | Description | Branche solution |
|----------|-------------|------------------|
| **1 — Math** | Classe `Math` avec `sum`, `subtract`, `multiply`, `divide` + DataProvider | `solution/exercise-1` |
| **2 — ProductCart** | `Product` + `Cart` avec frais de port et bug de précision flottante (fix BC Math) | `solution/exercise-2` |
| **2 — Stateless** | Refacto de `Math` en stateless (pattern AAA) | `solution/exercise-2-stateless` |
| **3 — PaymentGateway** | Mock d'une dépendance externe avec PHPUnit | `solution/exercise-3-phpunit` |
| **3 bis — Prophecy** | Même exercice avec Prophecy (spying propre) | `solution/exercise-3-prophecy` |
| **API — Chuck Norris** | Client HTTP, refacto, Guzzle, MockHandler, bug-fix-first-test | `solution/exercise-api` |

Pour voir une solution :

```bash
git checkout solution/exercise-1
```

## Coding style

```bash
make cs-check  # vérification
make cs-fix    # correction auto
```
