class ScoreCalculator {
    static calculateOverallScore(metrics) {
        const weights = {
            sentiment: 0.3,
            technical: 0.3,
            market: 0.2,
            risk: 0.2
        };

        return Object.entries(metrics).reduce((score, [key, value]) => {
            return score + (value * weights[key]);
        }, 0);
    }

    static normalizeScore(score, min = 0, max = 100) {
        return Math.max(min, Math.min(max, Math.round(score)));
    }
}
