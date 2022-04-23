
# Environment variables
$environment = "dev"
if $environment == "dev"
  set :endpoint, 'https://wines-mesasurements-dev.iseazy.es'
  set :isProd, 0
else
  set :endpoint, 'https://wines-mesasurements.iseazy.es'
  set :isProd, 1
end

# Patterns
set :dateUtc, 'YYYY-MM-DD'
set :hourUtc, 'hh:mm:ss'
set :datetimeUtc, 'YYYY-MM-DDThh:mm:ssZ'

# Global Variables
config[:isProd]
config[:endpoint]
config[:dateUtc]
config[:hourUtc]
config[:datetimeUtc]