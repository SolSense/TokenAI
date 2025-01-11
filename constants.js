export const ANALYSIS_WEIGHTS = {
    VIRALITY: 0.3,
    QUALITY: 0.3,
    META_MATCH: 0.2,
    MARKET_SENTIMENT: 0.2
};

export const RISK_LEVELS = {
    LOW: { threshold: 20, color: '#10B981' },
    MEDIUM: { threshold: 50, color: '#F59E0B' },
    HIGH: { threshold: 80, color: '#EF4444' }
};

export const AI_PROMPTS = {
    BASIC_ANALYSIS: `Analyze this token...`,
    TECHNICAL_ANALYSIS: `Provide technical analysis...`,
    RISK_ASSESSMENT: `Assess the risks...`
};
