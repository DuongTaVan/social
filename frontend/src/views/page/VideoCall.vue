<template>
  <div id="video-call-div">
    <video muted id="local-video" autoplay></video>
    <video id="remote-video" autoplay></video>
    <div class="call-action-div">
      <button @click="muteVideo"><i class="fa fa-video-camera" :class="{'mute-video': !camera}"
                                    aria-hidden="true"></i></button>
      <button @click="muteAudio"><i class="fa fa-microphone" :class="{'mute-microphone': !microphone}"
                                    aria-hidden="true"></i></button>
      <button class="leave-call" @click="leaveCall"><i class="fa fa-phone" aria-hidden="true"></i></button>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      microphone: true,
      camera: true
    }
  },
  methods: {
    muteVideo() {
      this.camera = !this.camera
    },
    muteAudio() {
      this.microphone = !this.microphone
    }
  },
  created() {
    console.log(11111)
    navigator.getUserMedia({
      video: {
        frameRate: 24,
        width: {
          min: 480, ideal: 720, max: 1280
        },
        aspectRatio: 1.33333
      },
      audio: true
    }, (stream) => {
      document.getElementById("local-video").srcObject = stream
    })
  }
}
</script>
<style lang="scss">
#video-call-div {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

#local-video {
  position: absolute;
  top: 0;
  left: 0;
  margin: 16px;
  border-radius: 16px;
  max-width: 20%;
  max-height: 20%;
  background: #ffffff;
}

#remote-video {
  background: #000000;
  width: 100%;
  height: 100%;
}

.call-action-div {
  position: absolute;
  left: 50%;
  bottom: 32px;
  transform: translate(-50%, -50%);
}

.leave-call {
  background-color: red;
}

.mute-video, .mute-microphone {
  color: red;
}

i {
  font-size: 30px;
  background-color: green;
  color: #fff;
}
.leave-call{
  i{
    background-color: red;
  }
}
button {
  cursor: pointer;
}
</style>
