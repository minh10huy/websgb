<?php
namespace Aws\Waf;

use Aws\AwsClient;

/**
 * This client is used to interact with the **AWS WAF** service.
 *
 * @method \Aws\Result createByteMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createByteMatchSetAsync(array $args = [])
 * @method \Aws\Result createIPSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createIPSetAsync(array $args = [])
 * @method \Aws\Result createRateBasedRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRateBasedRuleAsync(array $args = [])
 * @method \Aws\Result createRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createRuleAsync(array $args = [])
 * @method \Aws\Result createSizeConstraintSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSizeConstraintSetAsync(array $args = [])
 * @method \Aws\Result createSqlInjectionMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createSqlInjectionMatchSetAsync(array $args = [])
 * @method \Aws\Result createWebACL(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createWebACLAsync(array $args = [])
 * @method \Aws\Result createXssMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise createXssMatchSetAsync(array $args = [])
 * @method \Aws\Result deleteByteMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteByteMatchSetAsync(array $args = [])
 * @method \Aws\Result deleteIPSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteIPSetAsync(array $args = [])
 * @method \Aws\Result deleteRateBasedRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRateBasedRuleAsync(array $args = [])
 * @method \Aws\Result deleteRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteRuleAsync(array $args = [])
 * @method \Aws\Result deleteSizeConstraintSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSizeConstraintSetAsync(array $args = [])
 * @method \Aws\Result deleteSqlInjectionMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteSqlInjectionMatchSetAsync(array $args = [])
 * @method \Aws\Result deleteWebACL(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteWebACLAsync(array $args = [])
 * @method \Aws\Result deleteXssMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise deleteXssMatchSetAsync(array $args = [])
 * @method \Aws\Result getByteMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getByteMatchSetAsync(array $args = [])
 * @method \Aws\Result getChangeToken(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangeTokenAsync(array $args = [])
 * @method \Aws\Result getChangeTokenStatus(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getChangeTokenStatusAsync(array $args = [])
 * @method \Aws\Result getIPSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getIPSetAsync(array $args = [])
 * @method \Aws\Result getRateBasedRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRateBasedRuleAsync(array $args = [])
 * @method \Aws\Result getRateBasedRuleManagedKeys(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRateBasedRuleManagedKeysAsync(array $args = [])
 * @method \Aws\Result getRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getRuleAsync(array $args = [])
 * @method \Aws\Result getSampledRequests(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSampledRequestsAsync(array $args = [])
 * @method \Aws\Result getSizeConstraintSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSizeConstraintSetAsync(array $args = [])
 * @method \Aws\Result getSqlInjectionMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getSqlInjectionMatchSetAsync(array $args = [])
 * @method \Aws\Result getWebACL(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getWebACLAsync(array $args = [])
 * @method \Aws\Result getXssMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise getXssMatchSetAsync(array $args = [])
 * @method \Aws\Result listByteMatchSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listByteMatchSetsAsync(array $args = [])
 * @method \Aws\Result listIPSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listIPSetsAsync(array $args = [])
 * @method \Aws\Result listRateBasedRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRateBasedRulesAsync(array $args = [])
 * @method \Aws\Result listRules(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listRulesAsync(array $args = [])
 * @method \Aws\Result listSizeConstraintSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSizeConstraintSetsAsync(array $args = [])
 * @method \Aws\Result listSqlInjectionMatchSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listSqlInjectionMatchSetsAsync(array $args = [])
 * @method \Aws\Result listWebACLs(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listWebACLsAsync(array $args = [])
 * @method \Aws\Result listXssMatchSets(array $args = [])
 * @method \GuzzleHttp\Promise\Promise listXssMatchSetsAsync(array $args = [])
 * @method \Aws\Result updateByteMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateByteMatchSetAsync(array $args = [])
 * @method \Aws\Result updateIPSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateIPSetAsync(array $args = [])
 * @method \Aws\Result updateRateBasedRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRateBasedRuleAsync(array $args = [])
 * @method \Aws\Result updateRule(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateRuleAsync(array $args = [])
 * @method \Aws\Result updateSizeConstraintSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSizeConstraintSetAsync(array $args = [])
 * @method \Aws\Result updateSqlInjectionMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateSqlInjectionMatchSetAsync(array $args = [])
 * @method \Aws\Result updateWebACL(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateWebACLAsync(array $args = [])
 * @method \Aws\Result updateXssMatchSet(array $args = [])
 * @method \GuzzleHttp\Promise\Promise updateXssMatchSetAsync(array $args = [])
 */
class WafClient extends AwsClient {}
