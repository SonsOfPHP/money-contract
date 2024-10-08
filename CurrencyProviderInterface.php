<?php

declare(strict_types=1);

namespace SonsOfPHP\Contract\Money;

/**
 * Currency Provider.
 *
 * @author Joshua Estes <joshua@sonsofphp.com>
 */
interface CurrencyProviderInterface
{
    /**
     * Returns all of the currencies this Currency Provide will provide.
     *
     * @throw MoneyExceptionInterface
     *   This method may throw an exception if, for example it's making queries
     *   to a database, if it's unable to return any currencies
     *
     * @return CurrencyInterface[]
     */
    public function getCurrencies(): iterable;

    /**
     * Pass in a currency object or a currency code (ie USD) and it
     * will return true is the currency exists in this provider.
     *
     *
     * @throw MoneyException
     * @throw UnknownCurrencyException
     */
    public function hasCurrency(CurrencyInterface|string $currency): bool;

    /**
     * Returns the currency or thows MoneyException is currency does not
     * exist in this provider.
     *
     *
     * @throw MoneyException
     * @throw UnknownCurrencyException
     */
    public function getCurrency(CurrencyInterface|string $currency): CurrencyInterface;

    /**
     * In case you need to run your own queries against this provider the query
     * method will allow you to do this.
     *
     * @throw MoneyException
     */
    public function query(CurrencyProviderQueryInterface $query);
}
