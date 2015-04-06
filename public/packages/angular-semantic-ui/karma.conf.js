basePath = '.';

files = [
  JASMINE,
  JASMINE_ADAPTER,
  'packages/jquery/dist/jquery.min.js',
  'packages/angular/angular.min.js',
  'packages/angular-mocks/angular-mocks.js',
  'src/**/*.js',
];

exclude = [
  'src/**/docs/*', 'src/**/README.md'
];

browsers = [
  'PhantomJS'
];

reporters = ['progress'];

port = 9018;
runnerPort = 9100;

colors = true;

logLevel = LOG_INFO

autoWatch = false;

singleRun = false;