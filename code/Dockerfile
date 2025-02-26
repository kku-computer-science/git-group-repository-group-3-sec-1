FROM jenkins/jenkins:lts

USER root

# Install dependencies
RUN apt-get update && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
    python3 \
    python3-pip \
    python3-testresources \
    git \
    curl \
    wget \
    unzip \
    gnupg \
    software-properties-common \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Robot Framework and Selenium
RUN pip3 install --break-system-packages --no-cache-dir \
    robotframework \
    robotframework-seleniumlibrary

# Install Chrome
RUN wget -q -O - https://dl.google.com/linux/linux_signing_key.pub | apt-key add - \
    && echo "deb [arch=amd64] http://dl.google.com/linux/chrome/deb/ stable main" >> /etc/apt/sources.list.d/google-chrome.list \
    && apt-get update \
    && apt-get install -y google-chrome-stable \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install specific version of ChromeDriver
ENV CHROME_DRIVER_VERSION=121.0.6167.85
RUN wget -O /tmp/chromedriver.zip https://storage.googleapis.com/chrome-for-testing-public/${CHROME_DRIVER_VERSION}/linux64/chromedriver-linux64.zip \
    && unzip /tmp/chromedriver.zip -d /tmp/ \
    && mv /tmp/chromedriver-linux64/chromedriver /usr/local/bin/ \
    && rm -rf /tmp/chromedriver* \
    && chmod +x /usr/local/bin/chromedriver

# Create directory for test results
RUN mkdir -p /var/jenkins_home/workspace/robot-tests

# Switch back to jenkins user
USER jenkins